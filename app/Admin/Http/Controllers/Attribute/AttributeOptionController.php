<?php

namespace App\Admin\Http\Controllers\Attribute;

use App\Admin\Http\Controllers\Controller;
use App\Admin\Http\Requests\Attribute\AttributeOptionRequest;
use App\Admin\Repositories\Attribute\AttributeOptionRepositoryInterface;
use App\Admin\Repositories\Attribute\AttributeRepositoryInterface;
use App\Admin\Services\Attribute\AttributeOptionServiceInterface;
use App\Admin\DataTables\Attribute\AttributeOptionDataTable;

class AttributeOptionController extends Controller
{
    protected $repositoryAttribute;

    public function __construct(
        AttributeOptionRepositoryInterface $repository, 
        AttributeRepositoryInterface $repositoryAttribute, 
        AttributeOptionServiceInterface $service
    ){

        parent::__construct();

        $this->repository = $repository;
        $this->repositoryAttribute = $repositoryAttribute;
        $this->service = $service;
        
    }

    public function getView(){
        return [
            'index' => 'admin.attributes.options.index',
            'create' => 'admin.attributes.options.create',
            'edit' => 'admin.attributes.options.edit'
        ];
    }

    public function getRoute(){
        return [
            'index' => 'admin.attribute.option.index',
            'create' => 'admin.attribute.option.create',
            'edit' => 'admin.attribute.option.edit',
            'delete' => 'admin.attribute.option.delete'
        ];
    }
    public function index($attribute_id, AttributeOptionDataTable $dataTable){
        $attribute = $this->repositoryAttribute->findOrFail($attribute_id);
        return $dataTable->with('attribute', $attribute)->render($this->view['index'], [
            'attribute' => $attribute
        ]);
    }

    public function create($attribute_id){
        $attribute = $this->repositoryAttribute->findOrFail($attribute_id);
        return view($this->view['create'], 
            [
                'attribute' => $attribute
            ]
        );
    }

    public function store(AttributeOptionRequest $request){

        $response = $this->service->store($request);
        if($response){
            return to_route($this->route['index'], $response->attribute_id)->with('success', __('notifySuccess'));
        }
        return back()->with('error', __('notifyFail'))->withInput();
    }

    public function edit($id){
        
        $attributeOption = $this->repository->findOrFailWithRelations($id);
        return view(
            $this->view['edit'],
            [
                'attribute_option' => $attributeOption,
            ]
        );

    }
 
    public function update(AttributeOptionRequest $request){

        $instance = $this->service->update($request);
        if($instance){
            return to_route($this->route['index'], $instance->attribute_id)->with('success', __('notifySuccess'));
        }
        return back()->with('error', __('notifyFail'))->withInput();

    }

    public function delete($attribute_id, $id){

        $this->service->delete($id);
        
        return to_route($this->route['index'], $attribute_id)->with('success', __('notifySuccess'));
        
    }
}