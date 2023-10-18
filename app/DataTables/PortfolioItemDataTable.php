<?php

namespace App\DataTables;

use App\Models\PortfolioItem;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PortfolioItemDataTable extends DataTable
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
              return '<img style="width:70px" src="'.asset(env('PORTFOLIO_ITEM_IMAGE_UPLOAD_PATH').$query->image).'">';
            })
            ->addColumn('category_id' , function($query){
                return $query->category->name;
            })
            ->addColumn('created_at' , function($query){
                return date('Y-m-d' , strtotime($query->created_at));
            })
            ->addColumn('action', function($query){
                return '<a href="'.route('admin.portfolio-item.edit' , $query->id).'" class="btn btn-outline-primary"><i class="far fa-edit"></i></a>
                <a href="'.route('admin.portfolio-item.destroy' , $query->id).'" class="btn btn-outline-danger delete-item ml-2"><i class="fas fa-trash-alt"></i></a>';
            })
            ->rawColumns(['image' , 'action'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(PortfolioItem $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('portfolioitem-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(0)
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
            Column::make('id')->width(60),
            Column::make('image')->width(80),
            Column::make('title'),
            Column::make('category_id'),
            Column::make('created_at')->width(100),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(100)
                  ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'PortfolioItem_' . date('YmdHis');
    }
}
