<?php

namespace App\DataTables;

use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class SubCategoryDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
        ->addColumn('image', function ($query) {
            return $img = $query->image ? "<img src='" . asset('storage/' . $query->image) . "'  width='150'/>" : 'No Image';
        })
        ->addColumn('created_at', function ($query) {
            return date("F d,Y", strtotime($query->created_at));
        })
        ->addColumn('action', function ($query) {

            $editBtn = "<a href='" . route('admin.sub-category.edit', $query->id) . "' class='badge bg-info-subtle text-info'><i class='ri-pencil-fill align-bottom'></i>Edit</a>";

            $deleteBtn = "<a href='" . route('admin.sub-category.destroy', $query->id) . "' class='badge bg-danger-subtle text-danger delete-item'><i class='ri-delete-bin-fill align-bottom'></i>Delete</a>";

            return $editBtn . $deleteBtn;
        })
        ->addColumn('status', function ($query){
            $checked = $query->status ? 'checked' : '';
            $toggleId = 'toggle_' . $query->id;
            $route = route('admin.sub-category.toggle', $query->id);

            return view('admin.components.toggle-button', compact('checked', 'toggleId', 'route'));
        })
        ->addColumn('category_id', function ($query){
            return $query->category ? $query->category->name : '-';
        })
        ->rawColumns(['image', 'action', 'status'])
        ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(SubCategory $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('subcategory-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make('name'),
            Column::make('category_id')
                ->title('Category'),
            Column::make('image'),
            Column::make('status')
                ->exportable(false)
                ->printable(false),
            Column::make('description'),
            Column::make('created_at'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'SubCategory_' . date('YmdHis');
    }
}
