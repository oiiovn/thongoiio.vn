<?php

namespace App\Admin\Http\Controllers\Transaction;

use App\Admin\Http\Controllers\Controller;
use App\Admin\DataTables\Transaction\TransactionDataTable;
use App\Repositories\Transactions\TransactionRepositoryInterface;

class TransactionController extends Controller
{
    public function __construct(
        TransactionRepositoryInterface $repository,
    ) {

        parent::__construct();

        $this->repository = $repository;

    }

    public function getView()
    {
        return [
            'index' => 'admin.transaction.index',
            'edit' => 'admin.transaction.show'
        ];
    }

    public function getRoute()
    {
        return [
            'index' => 'admin.transaction.index',
            'edit' => 'admin.transaction.show',
        ];
    }
    public function index(TransactionDataTable $dataTable)
    {
        return $dataTable->render($this->view['index'], []);
    }
    public function show($id)
    {
        $instance = $this->repository->find($id, ['user']);
        return view(
            $this->view['edit'],
            [
                'transaction' => $instance,
            ],
        );
    }
}
