<?php

namespace App\Controllers;

use Crudch\Foundation\Controller;

class IndexController extends Controller
{
    public function index()
    {
        return view('index/main');
    }
}
