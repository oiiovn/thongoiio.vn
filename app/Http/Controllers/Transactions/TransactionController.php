<?php

namespace App\Http\Controllers\Transactions;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Request\Transactions\Withdrawn\WithdrawnRequest;
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
            'index' => 'user.transactions.index',
        ];
    }

    public function index(Request $request){
        $user = auth()->user();
        if($request->has('search')){
            $instance = $this->repository->getQueryBuilderByUserOrderBy($user->id)->where('code', 'LIKE', "%$request->search%");
        }else{
            $instance = $this->repository->getQueryBuilderByUserOrderBy($user->id);
        }
        $instance = $instance->paginate(10);
        return view($this->view['index'], [
            'transactions'=> $instance
        ]);
    }

}
