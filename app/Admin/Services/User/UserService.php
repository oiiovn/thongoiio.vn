<?php

namespace App\Admin\Services\User;

use App\Admin\Services\User\UserServiceInterface;
use  App\Admin\Repositories\User\UserRepositoryInterface;
use Illuminate\Http\Request;
use App\Admin\Traits\Setup;
use App\Enums\User\UserRoles;
use App\Models\User;

class UserService implements UserServiceInterface
{
    use Setup;
    /**
     * Current Object instance
     *
     * @var array
     */
    protected $data;

    protected $repository;

    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function store(Request $request)
    {

        $this->data = $request->validated();
        $this->data['code'] = $this->createCodeUser();
        $this->data['roles'] = UserRoles::Member;
        $this->data['password'] = bcrypt($this->data['password']);

        return $this->repository->create($this->data);
    }

    public function update(Request $request)
    {

        $this->data = $request->validated();

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

    public function upgrade($id)
    {
        $user = User::find($id);
        if ($user->roles->value == 1) {
            $user->roles = 2;
            $user->save();
        }
    }

    public function reject($id)
    {
        $user = User::find($id);
        $user->name_shop = null;
        $user->save();
    }

    public function uyTin($id)
    {
        $user = User::find($id);
        $user->is_reputable = !$user->is_reputable;
        $user->save();
    }
}
