<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function home()
    {
        return view('pages.home');
    }
}
