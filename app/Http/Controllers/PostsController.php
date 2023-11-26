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
        // cursorPaginate() use cursor or pointer to navigate set of data
        // Data is retrieved in smaller chunks rather then all at once.
        // USE LESS MEMORY than paginate() and simplePaginate()
        // NEED ORDER BY because cursorPaginate() navigate through ordered data set
        // BAD less intuitive 
        $posts = DB::table('posts')
        ->orderBy('created_at', 'desc') // NEED to specify order by in which order will be data set be retrieved.
                                        // without of it cursor will not know how to properly navigate through data set.
        ->where('is_published', true)
        ->cursorPaginate(5); // param same as paginate().

        // $post->links() return ?cursor= hashed identifier 
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
