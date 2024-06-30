<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PegawaiControler extends Controller
{
    public function index(Request $request) {

        $query = $request->input('query');

        $dataFound = true;

        if (!is_null($query)) {
            $ustads = User::where('active_status', 1)
                    ->where(function($q) use ($query) {
                        $q->where('name', 'LIKE', "%$query%")
                          ->orWhere('spesialis', 'LIKE', "%$query%")
                          ->orWhere('prestasi', 'LIKE', "%$query%");
                    })
                    ->paginate(8);
        } else {
            $ustads = User::where('role_id', 3)->where('active_status',1)->paginate(8);
        }

        if ($ustads->isEmpty()) {
            $dataFound = false;
        }

        return view('admin.pages.dashboard', compact('ustads','dataFound'));
    }
}
