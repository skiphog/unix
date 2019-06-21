<?php

namespace App\Controllers\Auth;

use App\Components\Guard;
use App\Controllers\ApiResponser;
use App\Models\Auth\Reg;
use App\Requests\LoginRequest;
use Crudch\Foundation\Controller;

class LoginController extends Controller
{
    use ApiResponser;

    /**
     * Страница входа
     */
    public function login()
    {
        return view('auth/login');
    }

    /**
     * Аутентификация
     *
     * @param LoginRequest $request
     *
     * @return \Crudch\Http\Response
     */
    public function auth(LoginRequest $request)
    {
        if (!$user = Reg::getUserForAuth($request->post('email'))) {
            return $this->error(['email' => 'Пользователя с таким email не зарегистрирован']);
        }

        if ($user['password'] !== md5($request->post('password'))) {
            return $this->error(['password' => 'Пароль неверный']);
        }

        Guard::login($user);

        return $this->success($user);
    }
}
