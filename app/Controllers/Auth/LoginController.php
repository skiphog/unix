<?php

namespace App\Controllers\Auth;

use App\Requests\LoginRequest;
use Crudch\Foundation\Controller;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth/login');
    }

    public function auth(LoginRequest $request)
    {

    }
}
