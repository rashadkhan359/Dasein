<?php

namespace App\DataTables;

use App\Models\Slider;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class SliderDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))

            ->addColumn('image', function($query){
                return $img = "<img src='". $query->image_url ."' width='100'/>";
            })
            ->addColumn('button_url', function ($query) {
                return "<a href='" . $query->button_url . "' class='btn btn-sm rounded-pill btn-soft-" . ($query->button_color ? $query->button_color : 'info') . "'>Show</a>";
            })
            ->addColumn('visibility', function ($query){
                $active  = '<span class="badge rounded-pill badge-outline-success">Active</span>';
                $inActive  = '<span class="badge rounded-pill badge-outline-danger">Inactive</span>';

                if($query->visibility == 1){
                    return $active;
                }else{
                    return $inActive;
                }
            })
            ->addColumn('action', function($query){
                $editBtn = "<a href='". route('admin.slider.edit', $query->id) . "' class='badge bg-info-subtle text-info me-2' ><i class='ri-pencil-fill align-bottom'></i>Edit</a>";
                $deleteBtn = "<a href='". route('admin.slider.destroy', $query->id) . "' class='badge bg-danger-subtle text-danger me-2 delete-item' ><i class='ri-delete-bin-fill align-bottom'></i>Delete</a>";
                return $editBtn.$deleteBtn;
            })
            ->addColumn('created_at', function ($query){
                return date("F d,Y", strtotime($query->created_at));
            })

            ->rawColumns(['image', 'button_url','action', 'visibility'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Slider $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('slider-table')
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

            Column::make('id')->width(100),
            Column::make('image')->width(150),
            Column::make('main_title'),
            Column::make('mini_title'),
            Column::make('button_url'),
            Column::make('visibility'),
            Column::make('created_at'),

            Column::computed('action')
            ->exportable(false)
            ->printable(false)
            ->width(100)
            ->addClass(''),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Slider_' . date('YmdHis');
    }
}
