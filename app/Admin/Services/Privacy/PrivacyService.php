<?php

namespace App\Admin\Services\Privacy;

use App\Admin\Services\Privacy\PrivacyServiceInterface;
use App\Admin\Repositories\Privacy\PrivacyRepositoryInterface;
use Illuminate\Http\Request;
use App\Admin\Traits\Setup;

class PrivacyService implements PrivacyServiceInterface
{
    use Setup;

    protected $data;

    protected $repository;

    public function __construct(PrivacyRepositoryInterface $repository)
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
