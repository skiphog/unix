<?php

namespace App\Controllers;

use App\Models\Diary;
use Crudch\Foundation\Controller;
use Crudch\Http\Exceptions\NotFoundException;

/**
 * Class DiaryController
 *
 * @package App\Controllers
 */
class DiaryController extends Controller
{
    /**
     * @return mixed
     */
    public function index()
    {
        return view('diaries/index');
    }

    /**
     * @param $id
     *
     * @return \Crudch\Http\Response
     * @throws NotFoundException
     */
    public function show($id)
    {
        if (!$diary = Diary::findById($id)) {
            throw new NotFoundException('Дневник не существует или удален');
        }

        return view('diaries/show', compact('id'));
    }

    /**
     * @return mixed
     */
    public function user()
    {
        return view('diaries/user');
    }
}
