<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\RegisterInterface;
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
    }
}
