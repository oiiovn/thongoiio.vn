<?php

namespace App\Services\Bank;

use App\Services\Bank\BankServiceInterface;
use App\Repositories\Bank\BankRepositoryInterface;
use Illuminate\Http\Request;
use App\Admin\Traits\Setup;

class BankService implements BankServiceInterface
{
    use Setup;
    /**
     * Current Object instance
     *
     * @var array
     */
    protected $data;
    
    protected $repository;

    public function __construct(BankRepositoryInterface $repository){
        $this->repository = $repository;
    }
    
    public function store(Request $request){
        $this->data = $request->validated();

        return $this->repository->create($this->data);
    }

    public function update(Request $request){
        
        $this->data = $request->validated();
        
        return $this->repository->update($this->data['id'], $this->data);

    }

    public function delete($id){
        return $this->repository->delete($id);

    }

}