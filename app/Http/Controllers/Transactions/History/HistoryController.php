<?php

namespace App\Http\Controllers\Transactions\History;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Request\Transactions\Withdrawn\WithdrawnRequest;
use App\Services\Transactions\Deposit\DepositServiceInterface;
use App\Services\Transactions\Withdrawn\WithdrawnServiceInterface;
use App\Repositories\Transactions\Deposit\DepositRepositoryInterface;
use App\Repositories\Transactions\Withdrawn\WithdrawnRepositoryInterface;

class HistoryController extends Controller
{
    protected $withdrawnRepository;
    protected $withdrawnService;
    protected $depositRepository;
    protected $depositService;

    public function __construct(
        WithdrawnRepositoryInterface $withdrawnRepository,
        WithdrawnServiceInterface $withdrawnService,
        DepositRepositoryInterface $depositRepository,
        DepositServiceInterface $depositService,
    ) {
        parent::__construct();

        $this->withdrawnRepository = $withdrawnRepository;

        $this->withdrawnService = $withdrawnService;

        $this->depositRepository = $depositRepository;

        $this->depositService = $depositService;
    }

    public function getView()
    {
        return [
            'deposit' => 'user.transactions.history.deposit.index',
            'withdrawn' => 'user.transactions.history.withdrawn.index',

        ];
    }

    public function deposit(Request $request)
    {
        $instance = auth()->user();
        if($request->has('search')){
            $deposits = $instance->deposits()->where('code', 'LIKE', "%$request->search%")->latest()->paginate(10);
        }else{
            $deposits = $instance->deposits()->latest()->paginate(10);
        }
        return view($this->view['deposit'], ['deposits' => $deposits]);
    }
    public function withdrawn(Request $request)
    {
        $instance = auth()->user();
        if($request->has('search')){
            $withdrawns = $instance->withdrawns()->where('code', 'LIKE', "%$request->search%")->latest()->with('bankAccount')->paginate(10);
        }else{
            $withdrawns = $instance->withdrawns()->latest()->with('bankAccount')->paginate(10);
        }
        // dd($withdrawns);
        return view($this->view['withdrawn'], ['withdrawns' => $withdrawns]);
    }
}
