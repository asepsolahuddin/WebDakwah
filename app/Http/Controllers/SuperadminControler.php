<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuperadminControler extends Controller
{
    public function index() {
        return view('admin.pages.db-admin');
    }
}
