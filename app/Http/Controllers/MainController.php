<?php

namespace App\Http\Controllers;

use App\Models\Load;

class MainController extends Controller
{
    public function index()
    {
        Load::factory()->count(20)
            ->hasPoint()
            ->create();

        return view('index');
    }
}
