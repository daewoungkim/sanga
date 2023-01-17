<?php

namespace App\Http\Controllers;

class AntController extends Controller
{
    public function index()
    {
        return view('ant.main', []);
    }
}
