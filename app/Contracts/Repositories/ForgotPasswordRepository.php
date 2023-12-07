<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\ForgotPasswordInterface;
use App\Models\PasswordResetToken;

class ForgotPasswordRepository extends BaseRepository implements ForgotPasswordInterface
{
    public function __construct(PasswordResetToken $passwordResetToken)
    {
        $this->model = $passwordResetToken;
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
            ->updateOrCreate([
                'email' => $data['email']
            ], $data);
    }

    /**
     * getWhere
     *
     * @param  mixed $data
     * @return mixed
     */
    public function getWhere(array $data): mixed
    {
        return $this->model->query()
            ->where('email', $data['email'])
            ->first();
    }
}
