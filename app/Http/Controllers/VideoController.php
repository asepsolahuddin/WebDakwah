<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $videos = Video::latest()->paginate(10);

        //render view
        return view('admin.pages.db-video', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.db-cr-video');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'judul' => 'required',
            'cover_path' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'deskripsi' => 'required',
            'video_url' => 'required',
    
            ]);

            $cover_path = $request->file('cover_path');
            $cover_path->storeAs('public/products', $cover_path->hashName());

            Video::create([
                'user_id' => $request->user_id,
                'judul' => $request->judul,
                'cover_path' =>$cover_path->hashName(),
                'deskripsi' => $request->deskripsi,
                'video_url' => $request->video_url,
                ]);

            return redirect()->route('dbvideos.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        $videos = Video::FindOrFail($id);

        return view('admin.pages.db-view-video', compact('videos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $videos = Video::FindOrFail($id);

        return view('admin.pages.db-edit-video', compact('videos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required',
            'judul' => 'required',
            'cover_path' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'deskripsi' => 'required',
            'video_url' => 'required',
            'kategori' => 'required',
        ]);
    
        // Cari video
        $video = Video::findOrFail($id);
    
        // Mengecek apakah ada file image
        if ($request->hasFile('cover_path')) {
            // Upload gambar baru
            $cover_path = $request->file('cover_path');
            $cover_path->storeAs('public/products', $cover_path->hashName());
    
            // Menghapus gambar lama jika ada
            if ($video->cover_path) {
                Storage::delete('public/products/' . $video->cover_path);
            }
    
            // Update video dengan gambar baru
            $video->update([
                'user_id' => $request->user_id,
                'judul' => $request->judul,
                'cover_path' => $cover_path->hashName(),
                'deskripsi' => $request->deskripsi,
                'video_url' => $request->video_url,
            ]);
        } else {
            // Update video tanpa mengubah gambar
            $video->update([
                'user_id' => $request->user_id,
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'video_url' => $request->video_url,
            ]);
        }
    
        return redirect()->route('dbvideos.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $video = Video::FindOrFail($id);

        Storage::delete('public/products'. $video->custom_path);

        $video->delete();

        return redirect()->route('dbvideos.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
