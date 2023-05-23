<?php
namespace App\DataTables;

use App\Models\Goods;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class GoodsDataTables extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', function($row){
                $btn = '
                <div style="float:left;">
                    <a href="http://upload.fof.kr?id='.$row->id.'" class="edit btn btn-primary btn-sm">메인</a>
                    <a href="http://upload.fof.kr/sub.php?id='.$row->id.'" class="edit btn btn-info btn-sm">서브</a>
                </div>
                ';
                return $btn;
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Goods $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Goods $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('users-table')
            ->columns($this->getColumns())
            ->dom('frtip')
            ->orderBy(0);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('id'),
            Column::make('code'),
            Column::make('code2'),
            Column::make('name'),
            Column::make('size'),
            Column::make('size2'),
            Column::make('size3'),
            Column::make('category'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->addClass('text-center'),
        ];
    }
}
