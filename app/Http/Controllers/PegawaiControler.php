<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PegawaiControler extends Controller
{
    public function index() {
        return view('admin.pages.dashboard');
    }
}
