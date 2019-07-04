<?php

namespace App\Controllers;

use Crudch\Foundation\Controller;

/**
 * Class FindController
 *
 * @package App\Controllers
 */
class FindController extends Controller
{
    /**
     * @return mixed
     */
    public function index()
    {
        return view('find/list');
    }

    /**
     * @return mixed
     */
    public function search()
    {
        return view('find/result');
    }
}
