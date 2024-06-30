<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->input('query');
        if (!is_null($query)) {
            $artikels = Artikel::where('judul', 'LIKE', "%$query%")->paginate(10);
        } else {
            $artikels = Artikel::latest()->paginate(10);
        }
        //render view
        return view('admin.pages.db-artikel', compact('artikels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.db-cr-artikel');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            // 'user_id' => 'required',
            'cover_path' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'judul' => 'required',
            'tag_line'  => 'required', 
            'deskripsi' => 'required',
    
            ]);
    
            //upload gambar
            $cover_path = $request->file('cover_path');
            $cover_path->storeAs('public/products', $cover_path->hashName());
    
            //insert artikels
            Artikel::create([
            // 'user_id' => $request->user_id,
            'cover_path' =>$cover_path->hashName(),
            'judul' => $request->judul,
            'tag_line' => $request->tag_line,
            'deskripsi' => $request->deskripsi,
            ]);
        //redirect to index
        return redirect()->route('dbartikels.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $artikels = Artikel::FindOrFail($id);

        return view('admin.pages.db-view-artikel', compact('artikels'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        $artikels = Artikel::FindOrFail($id);

        return view('admin.pages.db-edit-artikel', compact('artikels'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            // 'user_id' => 'required',
            'judul' => 'required',
            'cover_path' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'tag_line' => 'required',
            'deskripsi' => 'required',
        ]);
    
        // Cari artikels
        $artikels = Artikel::findOrFail($id);
    
        // Mengecek apakah ada file image
        if ($request->hasFile('cover_path')) {
            // Upload gambar baru
            $cover_path = $request->file('cover_path');
            $cover_path->storeAs('public/products', $cover_path->hashName());
    
            // Menghapus gambar lama jika ada
            if ($artikels->cover_path) {
                Storage::delete('public/products/' . $artikels->cover_path);
            }
    
            // Update artikels dengan gambar baru
            $artikels->update([
                // 'user_id' => $request->user_id,
                'judul' => $request->judul,
                'cover_path' => $cover_path->hashName(),
                'tag_line' => $request->tag_line,
                'deskripsi' => $request->deskripsi,
            ]);
        } else {
            // Update artikels tanpa mengubah gambar
            $artikels->update([
                // 'user_id' => $request->user_id,
                'judul' => $request->judul,
                'tag_line' => $request->tag_line,
                'deskripsi' => $request->deskripsi,
            ]);
        }
    
        return redirect()->route('dbartikels.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $artikels = Artikel::FindOrFail($id);

        Storage::delete('public/products'. $artikels->custom_path);

        $artikels->delete();

        return redirect()->route('dbartikels.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
