<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UstadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request){
    $query = $request->input('query');

    if (!is_null($query)) {
        $ustads = User::where('role_id', 3)
            ->where(function ($q) use ($query) {
                $q->where('name', 'LIKE', "%$query%")
                    ->orWhere('spesialis', 'LIKE', "%$query%")
                    ->orWhere('active_status', 'LIKE', "%$query%");
            })
            ->paginate(10);
    } else {
        $ustads = User::where('role_id', 3)->paginate(10);
    }

    return view('admin.pages.db-ustad', compact('ustads'));
    }

    public function show(string $id)
    {
        $dtustad = User::FindOrFail($id);
        return view('admin.pages.db-view-ustad', compact('dtustad'));
    }

    public function edit(string $id)
    {
        User::where('id', $id)
            ->update(['active_status' => 1]);
        return redirect()->route('dbustads.index')->with(['success' => 'Ustad Berhasil Diverifikasi!']);
    }

    public function destroy($id)
    {
        $ustads = User::FindOrFail($id);

        $ustads->delete();

        return redirect()->route('dbustads.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }


}
