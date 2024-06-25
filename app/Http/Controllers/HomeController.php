<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Artikel::orderBy('created_at', 'desc')->take(3)->get();

        return view('user.pages.home', compact('posts'));
    }

    public function detail_artikel(string $id) {
        $posts = Artikel::FindOrFail($id);
        $recents = $this->recent_artikel();

        return view('user.pages.detail-artikel', compact('posts','recents'));
    }

    public function recent_artikel(){
        return Artikel::orderBy('created_at', 'desc')->take(6)->get();
    }

    public function artikel(Request $request){
        $query = $request->input('query');

        $recents = $this->recent_artikel();
        $newss = $this->search($query);

    return view('user.pages.artikel', compact('recents', 'newss', 'query'));
    }

    public function search($query){

        $posts = Artikel::query();

        if (!empty($query)) {
            $posts->where('judul', 'like', "%$query%")
                  ->orWhere('deskripsi', 'like', "%$query%");
        }

        return $posts->paginate(3);

    }

    public function video(){
        return view('user.pages.video');
    
    }

    public function detail_video(){
        return view('user.pages.detail-video');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show( $home)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $home)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $home)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $home)
    {
        //
    }
}
