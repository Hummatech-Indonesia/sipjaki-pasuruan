<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\ServiceProviderInterface;
use App\Contracts\Interfaces\UserInterface;
use Illuminate\Http\Request;

class ServiceProviderController extends Controller
{
    private UserInterface $user;
    private ServiceProviderInterface $serviceProvider;
    public function __construct(UserInterface $user, ServiceProviderInterface $serviceProvider)
    {
        $this->user = $user;
        $this->serviceProvider = $serviceProvider;
    }

    public function update()
    {
    }
}
