<?php

namespace App\Admin\Services\Tutorial;

use App\Admin\Services\Tutorial\TutorialServiceInterface;
use App\Admin\Repositories\Tutorial\TutorialRepositoryInterface;
use Illuminate\Http\Request;
use App\Admin\Traits\Setup;

class TutorialService implements TutorialServiceInterface
{
    use Setup;

    protected $data;

    protected $repository;

    public function __construct(TutorialRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function store(Request $request)
    {
        $this->data = $request->validated();
        return $this->repository->create($this->data);
    }

    public function update(Request $request)
    {
        $this->data = $request->validated();
        return $this->repository->update($this->data['id'], $this->data);
    }

    public function delete($id)
    {
        return $this->repository->delete($id);
    }
}
