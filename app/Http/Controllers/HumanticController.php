<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HumanticController extends Controller
{
    public function dashboard()
    {
        return view('dashboard');
    }

    public function saveAndExport()
    {

    }
}
