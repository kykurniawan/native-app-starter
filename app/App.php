<?php

namespace App;

use App\Repositories\UserRepository;
use App\Services\UserService;

class App
{
    public static function user()
    {
        return new UserService(new UserRepository());
    }
}
