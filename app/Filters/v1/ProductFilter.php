<?php

namespace App\Filters\v1;

use App\Models\ProductVariant;
use App\Services\FilterService;
use Illuminate\Database\Eloquent\Builder;

class ProductFilter extends FilterService
{
    protected $allowedFilters = [
        'id' => ['eq', 'neq', 'gt', 'gte', 'lt', 'lte', 'in', 'between'],
        'name' => ['eq', 'neq', 'like'],
        'slug' => ['eq', 'neq', 'like'],
        'store_id' => ['eq', 'neq'],
        'category_id' => ['eq', 'neq'],
        'sub_category_id' => ['eq', 'neq'],
        'brand_id' => ['eq', 'neq'],
        'stock_qty' => ['eq', 'neq', 'gt', 'gte', 'lt', 'lte', 'in'],
        'price' => ['eq', 'neq', 'gt', 'gte', 'lt', 'lte', 'in', 'between'],
        'status' => ['eq', 'neq'],
        'visibility' => ['eq', 'neq'],
        'created_at' => ['eq', 'neq', 'gt', 'gte', 'lt', 'lte', 'between'],
        'updated_at' => ['eq', 'neq', 'gt', 'gte', 'lt', 'lte', 'between'],
    ];

    protected function applySearch(Builder $query, string $searchTerm): Builder
    {
        if (empty(trim($searchTerm))) {
            return $query;
        }

        $search = strtolower(trim($searchTerm));

        return $query->where(function ($subQuery) use ($search) {
            $subQuery->whereRaw('LOWER(name) LIKE ?', ["%{$search}%"])
                ->orWhereRaw('LOWER(slug) LIKE ?', ["%{$search}%"]);
            });
    }

    protected function between(Builder $query, string $field, array $values): Builder
    {
        if ($field === 'price' || $field === 'stock_qty') {
            return $this->filterByVariant($query, $field, $values);
        }

        return parent::between($query, $field, $values);
    }

    protected function eq(Builder $query, string $field, $value): Builder
    {
        return $query->whereHas('variant', function ($q) use ($field, $value) {
            $q->where($field, '=', $value);
        });
    }

    protected function neq(Builder $query, string $field, $value): Builder
    {
        return $query->whereHas('variants', function ($q) use ($field, $value) {
            $q->where($field, '!=', $value);
        });
    }

    protected function gt(Builder $query, string $field, $value): Builder
    {
        return $query->whereHas('variants', function ($q) use ($field, $value) {
            $q->where($field, '>', $value);
        });
    }

    protected function gte(Builder $query, string $field, $value): Builder
    {
        return $query->whereHas('variants', function ($q) use ($field, $value) {
            $q->where($field, '>=', $value);
        });
    }

    protected function lt(Builder $query, string $field, $value): Builder
    {
        return $query->whereHas('variants', function ($q) use ($field, $value) {
            $q->where($field, '<', $value);
        });
    }

    protected function lte(Builder $query, string $field, $value): Builder
    {
        return $query->whereHas('variants', function ($q) use ($field, $value) {
            $q->where($field, '<=', $value);
        });
    }

    protected function in(Builder $query, string $field, array $values): Builder
    {
        return $query->whereHas('variants', function ($q) use ($field, $values) {
            $q->whereIn($field, $values);
        });
    }

    protected function filterByVariant(Builder $query, string $field, array $values): Builder
    {
        [$minValue, $maxValue] = $values;

        return $query->whereHas('variants', function ($q) use ($minValue, $maxValue, $field) {
            $q->whereBetween($field, [$minValue, $maxValue]);
        });
    }
}
