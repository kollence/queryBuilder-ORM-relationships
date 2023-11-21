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
       $posts = DB::table('posts')
       // insert bulk of data in table by passing it as arrays in parent array
        ->insert([
            [
                'user_id' => 4,
                'title' => 'Post 1 First',
                'slug' => 'post-1-first',
                'content' => 'first from 2 in same time ',
                'excerpt' => 'first from 2 in same time ',
                'is_published' => false,
                'min_to_read' => 2,
            ],
            [
                'user_id' => 6,
                'title' => 'Post 1 Second',
                'slug' => 'post-1-second',
                'content' => 'second from 2 in same time ',
                'excerpt' => 'second from 2 in same time ',
                'is_published' => false,
                'min_to_read' => 2,
            ]
        ]);
        //will return true on stored
       dd($posts);
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
