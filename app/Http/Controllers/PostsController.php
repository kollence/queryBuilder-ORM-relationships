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
        $word = 'Quidem';
        // 2 paragraph 
        $paragraph = 'nemo odit';
        // orWhereFullText() that can be chained to whereFullText() [Full Text Indexes] is made for searching words, phrases, and sentences in text columns.
        // Best for searching a large amount of text. Maybe for Blog or Search Engine
        // Adds full text to OR WHERE clause for column that have [FULL TEXT INDEXES]
        $posts = DB::table('posts')
        ->whereFullText('content', $word) // check for $word in `content` column
        ->OrWhereFullText('content', $paragraph) // check for $paragraph in `content` column
        ->get();

        // $posts->toSql();                                          flags:IN BOOLEAN MODE                                               flags:IN BOOLEAN MODE
        // SELECT * FROM `posts` WHERE MATCH (`content`) AGAINST ('Quidem' IN NATURAL LANGUAGE MODE) OR MATCH (`content`) AGAINST ('nemo odit' IN NATURAL LANGUAGE MODE)

        // [NATURAL LANGUAGE MODE] is feature of full text search
        // that allows users to search for words and phrases in natural language syntax
        // that ignores word order and word capitalization.
        dd($posts); // return collection whit anything that matches WHERE $word OR WHERE $paragraph in column `content`
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
