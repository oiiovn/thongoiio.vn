<?php

namespace App\Admin\DataTables\Transaction\Deposit;

use App\Models\Deposit;
use App\Admin\Traits\GetConfig;
use App\Admin\DataTables\BaseDataTable;
use App\Repositories\Transactions\Deposit\DepositRepositoryInterface;

class DepositDataTable extends BaseDataTable
{

    use GetConfig;
    /**
     * Available button actions. When calling an action, the value will be used
     * as the function name (so it should be available)
     * If you want to add or disable an action, overload and modify this property.
     *
     * @var array
     */
    // protected array $actions = ['pageLength', 'excel', 'reset', 'reload'];
    protected array $actions = ['reset', 'reload'];

    public function __construct(
        DepositRepositoryInterface $repository
    ){
        parent::__construct();

        $this->repository = $repository;
    }

    public function getView(){
        return [
            'action' => 'admin.transaction.deposit.datatable.action',
        ];
    }
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $this->instanceDataTable = datatables()->eloquent($query)->addIndexColumn();
        $this->filterColumnCreatedAt();
        $this->editColumnUser();
        $this->editColumnTime();
        $this->addColumnAction();
        $this->editColumnStatus();
        $this->editColumnAmount();
        $this->editColumnFee();
        $this->rawColumnsNew();
        return $this->instanceDataTable;
    }
    
    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Deposit $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        return $this->repository->getQueryBuilderWithRelations();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        $this->instanceHtml = $this->builder()
        ->setTableId('depositTable')
        ->columns($this->getColumns())
        ->minifiedAjax()
        ->dom('Bfrtip')
        ->orderBy(0)
        ->selectStyleSingle();
        $this->htmlParameters();
        
        return $this->instanceHtml;
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function setCustomColumns(){
        $this->customColumns = $this->traitGetConfigDatatableColumns('deposit');
    }

    protected function filename(): string
    {
        return 'Deposit_' . date('YmdHis');
    }

    protected function filterColumnCreatedAt(){
        $this->instanceDataTable = $this->instanceDataTable->filterColumn('created_at', function($query, $keyword) {
            $query->whereDate('created_at', date('Y-m-d', strtotime($keyword)));
        });
    }
    protected function editColumnUser(){
        $this->instanceDataTable = $this->instanceDataTable->editColumn('user', function($deposit){
            return $deposit->user->email;
        });
    }
    protected function editColumnTime(){
        $this->instanceDataTable = $this->instanceDataTable->editColumn('time', '{{ format_datetime($created_at) }}');
    }

    protected function addColumnAction(){
        $this->instanceDataTable = $this->instanceDataTable->addColumn('action', $this->view['action']);
    }
    protected function filterColumnStatus(){
        $this->instanceDataTable = $this->instanceDataTable
        ->filterColumn('status', function($query, $keyword) {
            $query->where('status', $keyword);
        });
    }
    protected function editColumnStatus(){
        $this->instanceDataTable = $this->instanceDataTable->editColumn('status', function($deposit){
            return $deposit->status->description();
        });
    }
    protected function editColumnAmount(){
        $this->instanceDataTable = $this->instanceDataTable->editColumn('amount', function($deposit){
            return format_price($deposit->amount);
        });
    }
    protected function editColumnFee(){
        $this->instanceDataTable = $this->instanceDataTable->editColumn('fee', function($deposit){
            return format_price($deposit->fee);
        });
    }
    protected function rawColumnsNew(){
        $this->instanceDataTable = $this->instanceDataTable->rawColumns(['action']);
    }

    protected function htmlParameters(){

        $this->parameters['buttons'] = $this->actions;

        $this->parameters['initComplete'] = "function () {

            moveSearchColumnsDatatable('#depositTable');

            searchColumsDataTable(this);
        }";

        $this->instanceHtml = $this->instanceHtml
        ->parameters($this->parameters);
    }
}