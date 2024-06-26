<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Video;
use App\Models\Artikel;
use Illuminate\Http\Request;

class SuperadminControler extends Controller
{
    public function index() {
        // $ustadCount = User::where('role', 'ustad')->count();

        $userCount = User::count();
 
        $videoCount = Video::count();

        $artikelCount = Artikel::count();

        return view('admin.pages.db-admin',compact('userCount', 'videoCount', 'artikelCount'));
    }
}
