<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Builder;

abstract class FilterService
{
    protected $allowedFilters = [];
    protected $searchableFields = [];

    public function apply(Builder $query, array $filterParams): Builder
    {

        if (isset($filterParams['search'])) {
            $query = $this->applySearch($query, $filterParams['search']);
        }

        if (isset($filterParams['filters'])) {
            $query = $this->applyFilters($query, $filterParams['filters']);
        }

        if (isset($filterParams['sort'])) {
            $query = $this->applySort($query, $filterParams['sort']);
        }

        return $query;
    }

    public function getAllowedFilters(): array
    {
        return $this->allowedFilters;
    }

    public function getSearchableFields(): array
    {
        return $this->searchableFields;
    }

    protected function applySearch(Builder $query, string $searchTerm): Builder
    {
        return $query->where(function ($q) use ($searchTerm) {
            foreach ($this->searchableFields as $field) {
                $q->orWhere($field, 'LIKE', "%{$searchTerm}%");
            }
        });
    }

    protected function applyFilters(Builder $query, array $filters): Builder
    {
        foreach ($filters as $filter) {
            if ($this->isValidFilter($filter)) {
                $method = $filter['operator'];
                $query = $this->$method($query, $filter['field'], $filter['value']);
            }
        }
        return $query;
    }

    protected function isValidFilter(array $filter): bool
    {
        return isset($this->allowedFilters[$filter['field']]) &&
            in_array($filter['operator'], $this->allowedFilters[$filter['field']]);
    }

    protected function applySort(Builder $query, array $sort): Builder
    {
        foreach ($sort as $field => $direction) {
            if (isset($this->allowedFilters[$field])) {
                $query->orderBy($field, $direction);
            }
        }
        return $query;
    }

    protected function eq(Builder $query, string $field, $value): Builder
    {
        return $query->where($field, '=', $value);
    }

    protected function neq(Builder $query, string $field, $value): Builder
    {
        return $query->where($field, '!=', $value);
    }

    protected function gt(Builder $query, string $field, $value): Builder
    {
        return $query->where($field, '>', $value);
    }

    protected function gte(Builder $query, string $field, $value): Builder
    {
        return $query->where($field, '>=', $value);
    }

    protected function lt(Builder $query, string $field, $value): Builder
    {
        return $query->where($field, '<', $value);
    }

    protected function lte(Builder $query, string $field, $value): Builder
    {
        return $query->where($field, '<=', $value);
    }

    protected function like(Builder $query, string $field, $value): Builder
    {
        return $query->where($field, 'LIKE', "%{$value}%");
    }

    protected function in(Builder $query, string $field, array $values): Builder
    {
        return $query->whereIn($field, $values);
    }

    protected function between(Builder $query, string $field, array $values): Builder
    {
        return $query->whereBetween($field, $values);
    }

    protected function or(Builder $query, array $conditions): Builder
    {
        return $query->where(function ($q) use ($conditions) {
            foreach ($conditions as $condition) {
                if ($this->isValidFilter($condition)) {
                    $method = $condition['operator'];
                    $q->orWhere(function ($subQ) use ($method, $condition) {
                        $this->$method($subQ, $condition['field'], $condition['value']);
                    });
                }
            }
        });
    }
}
