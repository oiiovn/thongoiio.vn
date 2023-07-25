<?php

namespace App\Admin\Http\Controllers\News;

use App\Admin\Http\Controllers\Controller;
use App\Admin\Http\Requests\News\NewsRequest;
use App\Admin\Repositories\News\NewsRepositoryInterface;
use App\Admin\Services\News\NewsServiceInterface;
use App\Admin\DataTables\News\NewsDataTable;

class NewsController extends Controller
{
    protected $repositoryAdmin;

    public function __construct(
        NewsRepositoryInterface $repository,
        NewsServiceInterface $service
    ){

        parent::__construct();

        $this->repository = $repository;

        $this->service = $service;

    }

    public function getView(){
        return [
            'index' => 'admin.news.index',
            'create' => 'admin.news.create',
            'edit' => 'admin.news.edit'
        ];
    }

    public function index(NewsDataTable $dataTable){
        return $dataTable->render($this->view['index']);
    }

    public function create() {
        return view($this->view['create']);
    }

    public function edit($id) {
        $instance = $this->repository->findOrFail($id);
        return view($this->view['edit'], [
            'news' => $instance,
        ]);
    }

    public function store(NewsRequest $request){
        $instance = $this->service->store($request);
        return redirect()->route($this->view['index'])->with('success', __('notifySuccess'));
    }

    public function update(NewsRequest $request){
        $this->service->update($request);
        return redirect()->route($this->view['index'])->with('success', __('notifySuccess'));
    }

    public function delete($id){
        $this->service->delete($id);
        return redirect()->route($this->view['index'])->with('success', __('notifySuccess'));
    }
}
