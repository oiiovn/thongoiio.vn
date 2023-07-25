<?php

namespace App\Admin\DataTables\Job;

use App\Admin\DataTables\BaseDataTable;
use App\Admin\Repositories\Job\JobRepositoryInterface;
use App\Admin\Traits\GetConfig;

class JobDataTable extends BaseDataTable
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
        JobRepositoryInterface $repository
    ){
        parent::__construct();

        $this->repository = $repository;
    }

    public function getView(){
        return [
            'action' => 'admin.jobs.datatable.action',
            'editlink' => 'admin.jobs.datatable.editlink',
            'status' => 'admin.jobs.datatable.status',
            'shop' => 'admin.jobs.datatable.shop',
            'worker' => 'admin.jobs.datatable.worker',
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
        $this->instanceDataTable = datatables()->eloquent($query);
        $this->filterColumnShop();
        $this->filterColumnWorker();
        $this->editColumnName();
        $this->editColumnMoney();
        // $this->editColumnMoneyProduct();
        $this->editColumnMoneyProductAddition();
        $this->editColumnStatus();
        $this->editColumnShop();
        $this->editColumnWorker();
        $this->editColumnIsVirtual();
        $this->addColumnAction();
        $this->rawColumnsNew();
        return $this->instanceDataTable;
    }
    
    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\User $model
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
        ->setTableId('jobTable')
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
        $this->customColumns = $this->traitGetConfigDatatableColumns('job');
    }

    protected function filename(): string
    {
        return 'job_' . date('YmdHis');
    }

    protected function filterColumnShop(){
        $this->instanceDataTable = $this->instanceDataTable
        ->filterColumn('shop', function($query, $keyword) {
            $query->whereHas('shop', function($q) use ($keyword) { 
                $q->where('username', 'LIKE', '%'.$keyword.'%')
                ->orWhere('phone', 'LIKE', '%'.$keyword.'%')
                ->orWhere('email', 'LIKE', '%'.$keyword.'%')
                ->orWhere('fullname', 'LIKE', '%'.$keyword.'%');
            });
        });
    }
    protected function filterColumnWorker(){
        $this->instanceDataTable = $this->instanceDataTable
        ->filterColumn('worker', function($query, $keyword) {
            $query->whereHas('worker', function($q) use ($keyword) { 
                $q->where('username', 'LIKE', '%'.$keyword.'%')
                ->orWhere('phone', 'LIKE', '%'.$keyword.'%')
                ->orWhere('email', 'LIKE', '%'.$keyword.'%')
                ->orWhere('fullname', 'LIKE', '%'.$keyword.'%');
            });
        });
    }
    protected function editColumnName(){
        $this->instanceDataTable = $this->instanceDataTable->editColumn('name', $this->view['editlink']);
    }
    protected function editColumnMoney(){
        $this->instanceDataTable = $this->instanceDataTable->editColumn('money', '{{ format_price($money) }}');
    }
    protected function editColumnMoneyProduct(){
        $this->instanceDataTable = $this->instanceDataTable->editColumn('money_product', '{{ format_price($money_product) }}');
    }
    protected function editColumnMoneyProductAddition(){
        $this->instanceDataTable = $this->instanceDataTable->editColumn('money_product_addition', '{{ format_price($money_product_addition) }}');
    }
    protected function editColumnStatus(){
        $this->instanceDataTable = $this->instanceDataTable->editColumn('status', $this->view['status']);
    }
    protected function editColumnShop(){
        $this->instanceDataTable = $this->instanceDataTable->editColumn('shop', $this->view['shop']);
    }
    protected function editColumnWorker(){
        $this->instanceDataTable = $this->instanceDataTable->editColumn('worker', $this->view['worker']);
    }
    protected function editColumnIsVirtual(){
        $this->instanceDataTable = $this->instanceDataTable->editColumn('is_virtual', '{{ $is_virtual ? __("Yes") : __("No") }}');
    }
    protected function addColumnAction(){
        $this->instanceDataTable = $this->instanceDataTable->addColumn('action', $this->view['action']);
    }
    protected function rawColumnsNew(){
        $this->instanceDataTable = $this->instanceDataTable->rawColumns(['name', 'status', 'shop', 'worker', 'action']);
    }
    protected function htmlParameters(){

        $this->parameters['buttons'] = $this->actions;

        $this->parameters['initComplete'] = "function () {

            moveSearchColumnsDatatable('#jobTable');

            searchColumsDataTable(this);
        }";

        $this->instanceHtml = $this->instanceHtml
        ->parameters($this->parameters);
    }
}