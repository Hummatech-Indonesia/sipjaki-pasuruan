<?php

namespace App\Contracts\Repositories\Auth;

use App\Contracts\Interfaces\Auth\RegisterInterface;
use App\Contracts\Repositories\BaseRepository;
use App\Models\User;

class RegisterRepository extends BaseRepository implements RegisterInterface
{
    public function __construct(User $user)
    {
        $this->model = $user;
    }

    /**
     * store
     *
     * @param  mixed $data
     * @return mixed
     */
    public function store(array $data): mixed
    {
        return $this->model->query()
            ->create($data);
    }
}
