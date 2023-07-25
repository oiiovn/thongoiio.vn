<?php

namespace App\Admin\Services\Transaction;

use App\Admin\Services\Transaction\TransactionServiceInterface;
use  App\Admin\Repositories\Transaction\TransactionRepositoryInterface;
use Illuminate\Http\Request;
use App\Admin\Traits\Setup;

class TransactionService implements TransactionServiceInterface
{
    use Setup;
    /**
     * Current Object instance
     *
     * @var array
     */
    protected $data;
    
    protected $repository;

    public function __construct(TransactionServiceInterface $repository){
        $this->repository = $repository;
    }
    
    public function store($request){

    }

    public function update($request){

    }

    public function delete($id){
        return $this->repository->delete($id);

    }

}