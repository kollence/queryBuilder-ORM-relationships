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
    {   // 1 word
        // 2 paragraph 
        $fullText = '1 Quidem, 2 nemo veritatis possimus laudantium odit';
        // whereFullText() [Full Text Indexes] is made for searching words, phrases, and sentences in text columns.
        // Best for searching a large amount of text. Maybe for Blog or Search Engine
        // Adds full text to WHERE clause for column that have [FULL TEXT INDEXES]
        $posts = DB::table('posts')
        ->whereFullText('content', $fullText) // we set in migration fullText() for `content` column
        ->get();

        dd($posts); // return collection whit anything that matches $fullText
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
