<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Video;
use App\Models\Artikel;
use Illuminate\Http\Request;

class SuperadminControler extends Controller
{
    public function index()
    {
        // $ustadCount = User::where('role', 'ustad')->count();

        $userCount = User::count();

        $videoCount = Video::count();

        $artikelCount = Artikel::count();

        return view('admin.pages.db-admin', compact('userCount', 'videoCount', 'artikelCount'));
    }

    public function get_unverified_ustad()
    {

        $unverified_ustad = User::where('active_status', 0)->where('role_id', 3)->get();
    }

    public function change_verified_ustad_status($id)
    {
        $get_user_data_ustad = User::find($id);

        $get_user_data_ustad->active_status = 1;

        $get_user_data_ustad->save();

        User::where('id', $id)
            ->update(['active_status' => 1]);
    }
}
