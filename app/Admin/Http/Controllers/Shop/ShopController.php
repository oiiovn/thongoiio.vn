<?php

namespace App\Admin\Http\Controllers\Shop;

use App\Admin\Http\Controllers\Controller;
use App\Admin\Repositories\User\UserRepositoryInterface;
use App\Admin\Services\User\UserServiceInterface;
use App\Admin\DataTables\Shop\ShopDataTable;
use App\Enums\User\{UserVip, UserGender};

class ShopController extends Controller
{
    public function __construct(
        UserRepositoryInterface $repository, 
        UserServiceInterface $service
    ){

        parent::__construct();

        $this->repository = $repository;
        
        $this->service = $service;
        
    }

    public function getView(){
        return [
            'index' => 'admin.shop.index',
            'create' => 'admin.shop.create',
            'edit' => 'admin.shop.edit'
        ];
    }

    public function getRoute(){
        return [
            'index' => 'admin.shop.index',
            'create' => 'admin.shop.create',
            'edit' => 'admin.shop.edit',
            'delete' => 'admin.shop.delete'
        ];
    }

    public function index(ShopDataTable $dataTable){
        return $dataTable->render($this->view['index'], [
            'vip' => UserVip::asSelectArray(),
        ]);
    }

    public function dangKy(ShopDataTable $dataTable){
        return $dataTable->render($this->view['index'], [
            'vip' => UserVip::asSelectArray(),
        ]);
    }

    public function upgrade($id) {
        $this->service->upgrade($id);
        return redirect()->route($this->route['index'])->with('success', __('notifySuccess'));
    }

    public function reject($id) {
        $this->service->reject($id);
        return redirect()->route($this->route['index'])->with('success', __('notifySuccess'));
    }

    public function uyTin($id){
        $this->service->uyTin($id);
        return redirect()->route($this->route['index'])->with('success', __('notifySuccess'));
    }
}