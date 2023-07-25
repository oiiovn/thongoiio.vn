<?php

namespace App\Admin\DataTables\Tutorial;

use App\Admin\DataTables\BaseDataTable;
use App\Admin\Repositories\Tutorial\TutorialRepositoryInterface;
use App\Admin\Traits\GetConfig;

class TutorialDataTable extends BaseDataTable
{

    use GetConfig;

    protected array $actions = ['reset', 'reload'];

    public function __construct(
        TutorialRepositoryInterface $repository
    ){
        parent::__construct();

        $this->repository = $repository;
    }

    public function getView(){
        return [
            'action' => 'admin.tutorial.datatable.action',
            'editlink' => 'admin.tutorial.datatable.editlink',
        ];
    }

    public function dataTable($query)
    {
        $this->instanceDataTable = datatables()->eloquent($query)->addIndexColumn();
        $this->filterColumnCreatedAt();
        $this->editColumnId();
        $this->editColumnTitle();
        $this->editColumnLink();
        $this->editColumnCreatedAt();
        $this->addColumnAction();
        $this->rawColumnsNew();
        return $this->instanceDataTable;
    }

    public function query(\App\Models\Tutorial $model)
    {
        return $model->newQuery();
    }

    public function html()
    {
        $this->instanceHtml = $this->builder()
            ->setTableId('userTable')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(0)
            ->selectStyleSingle();

        $this->htmlParameters();

        return $this->instanceHtml;
    }

    protected function setCustomColumns(){
        $this->customColumns = $this->traitGetConfigDatatableColumns('tutorials');
    }

    protected function filename(): string
    {
        return 'Tutorial_' . date('YmdHis');
    }

    protected function filterColumnCreatedAt(){
        $this->instanceDataTable = $this->instanceDataTable->filterColumn('created_at', function($query, $keyword) {

            $query->whereDate('created_at', date('Y-m-d', strtotime($keyword)));

        });
    }

    protected function editColumnId(){
        $this->instanceDataTable = $this->instanceDataTable->editColumn('id', $this->view['editlink']);
    }
    protected function editColumnTitle(){
        $this->instanceDataTable = $this->instanceDataTable->editColumn('title', $this->view['editlink']);
    }
    protected function editColumnLink()
    {
        $this->instanceDataTable = $this->instanceDataTable->addColumn('link', function ($row) {
            return $row->link;
        });
//        $this->instanceDataTable = $this->instanceDataTable->editColumn('id', function ($row) {
//            $videoUrl = $row->link;
//            $videoId = $this->extractYoutubeVideoId($videoUrl);
//
//            $iframe = '<iframe width="560" height="315" src="https://www.youtube.com/embed/' . $videoId . '" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
//
//            return html_entity_decode($iframe);
//        })->rawColumns(['link']);
    }

    protected function extractYoutubeVideoId($url) {
        $pattern = '/(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:embed\/|watch\?v=|v\/|ytscreeningroom\?v=|youtu\.be\/|user\/\S+|v=)|youtu\.be\/)([^\?\s&]+)/';
        preg_match($pattern, $url, $matches);

        return isset($matches[1]) ? $matches[1] : null;
    }
    protected function editColumnCreatedAt(){
        $this->instanceDataTable = $this->instanceDataTable->editColumn('created_at', '{{ date("d-m-Y", strtotime($created_at)) }}');
    }
    protected function addColumnAction(){
        $this->instanceDataTable = $this->instanceDataTable->addColumn('action', $this->view['action']);
    }
    protected function rawColumnsNew(){
        $this->instanceDataTable = $this->instanceDataTable->rawColumns(['title', 'action']);
    }
    protected function htmlParameters(){

        $this->parameters['buttons'] = $this->actions;

        $this->parameters['initComplete'] = "function () {

            moveSearchColumnsDatatable('#userTable');

            searchColumsDataTable(this);
        }";

        $this->instanceHtml = $this->instanceHtml
            ->parameters($this->parameters);
    }
}
