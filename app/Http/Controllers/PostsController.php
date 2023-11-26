<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function index()
    {   
        // simplePaginate() to divide a large set of data into small chunks of pages
        // GOOD if you work with large data sets. More officiant then paginate()
        // USE LESS MEMORY than paginate()
        $posts = DB::table('posts')
        ->where('is_published', true)
        // 1: num of rows per page. 2: columns. 3: name you want page to be called= default page
        ->simplePaginate(10); // param same as paginate().

        // $post->links() will now have just two button <<previous & next>>
        return view('posts.index', ['posts' => $posts]);
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
