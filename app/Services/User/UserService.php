<?php

namespace App\Services\User;

use App\Services\User\UserServiceInterface;
use App\Repositories\User\UserRepositoryInterface;
use App\Services\File\FileService;
use Illuminate\Http\Request;
use App\Admin\Traits\Setup;
use App\Enums\User\UserRoles;
use App\Models\User;

class UserService implements UserServiceInterface
{

    use Setup;
    protected $repository;
    protected $serviceFile;
    protected $data;

    public function __construct(
        UserRepositoryInterface $repository,
        FileService $serviceFile
    ) {
        $this->repository = $repository;
        $this->serviceFile = $serviceFile;
    }

    public function store(Request $request)
    {
        $this->data = $request->validated();
        $this->data['code'] = $this->createCodeUser();
        $this->data['roles'] = UserRoles::Member;
        $this->data['password'] = bcrypt($this->data['password']);
        return $this->repository->create($this->data);
    }

    public function shop($request)
    {
        $user = User::whereId(auth()->user()->id)->first();
        $user->name_shop = $request->name_shop;
        $user->save();
    }

    public function update(Request $request)
    {
        $this->data = $request->validated();
        // dd($this->data);
        $this->handleFile();
        if (isset($this->data['password']) && $this->data['password']) {
            $this->data['password'] = bcrypt($this->data['password']);
        } else {
            unset($this->data['password']);
        }
        return $this->repository->update($this->data['id'], $this->data);
    }

    public function delete($id)
    {
        return $this->repository->delete($id);
    }

    public function updateContact($request)
    {
        $user = User::whereId(auth()->user()->id)->with('contact')->first()->contact;
        $user->address = $request->address;
        $user->facebook = $request->facebook;
        $user->zalo = $request->zalo;
        $user->save();
    }

    private function handleFile()
    {
        $folder = $this->folderUploadFileForUser('user');

        if (isset($this->data['avatar'])) {
            if ($this->data['avatar']) {
                $filePath = $this->serviceFile->setFolder($folder)->setFile($this->data['avatar']);
                $filePath = $filePath->upload();
            }
            $this->data['avatar'] = $filePath->getInstance();
        }

        if (isset($this->data['cover_photo'])) {
            if ($this->data['cover_photo']) {
                $filePath = $this->serviceFile->setFolder($folder)->setFile($this->data['cover_photo']);
                $filePath = $filePath->upload();
            }
            $this->data['cover_photo'] = $filePath->getInstance();
        }
    }
}
