<?php

namespace Haris\Http\Controllers\Diary;

use Haris\Http\Controllers\Controller;

class HomeController extends Controller
{

    public function index()
    {
        return view('blog.home.index');
    }
}
