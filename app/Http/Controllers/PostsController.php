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
        $fullTextOfColumn = 'Quidem nemo veritatis possimus laudantium odit.';
        // $posts = DB::table('posts')
        // ->select('title', 'content', 'excerpt') // Select the columns you need
        // ->whereRaw("MATCH(title, content, excerpt) AGAINST(? IN BOOLEAN MODE)", [$fullTextOfColumn])
        // ->get();
        $posts = DB::table('posts')
        ->whereFullText('content', $fullTextOfColumn)
        ->get();

        dd($posts); // return 
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
