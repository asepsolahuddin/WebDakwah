<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Video;
use App\Models\Artikel;
use Illuminate\Http\Request;

class SuperadminControler extends Controller
{
    public function index(Request $request)
    {
        $ustadCount = User::where('role_id', 3)->count();

        $userCount = User::count();

        $videoCount = Video::count();

        $artikelCount = Artikel::count();

        $query = $request->input('query');

        if (!is_null($query)) {
            $users = User::where('name', 'LIKE', "%$query%")
                        ->orWhere('role_id', 'LIKE', "%$query%")
                        ->paginate(10);;
        } else {
            $users = User::paginate(10);
        }
    
        return view('admin.pages.db-admin', compact('ustadCount','userCount', 'videoCount', 'artikelCount','users'));
    }

    public function destroy($id)
    {
        $users = User::FindOrFail($id);

        $users->delete();

        return redirect()->route('dbadmin.index')->with(['success' => 'Data Berhasil Dihapus!']);
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
