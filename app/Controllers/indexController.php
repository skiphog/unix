<?php

namespace App\Controllers;

use Crudch\Foundation\Controller;

class indexController extends Controller
{
    public function index()
    {
        return view('index');
    }
}
