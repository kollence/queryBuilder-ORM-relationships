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
       // insertOrIgnore() method that allows you to insert data into a DB table only if the row does not already exist.
        ->insertOrIgnore([
            [
                'user_id' => 2,
                'title' => 'Post 3 insertOrIgnore',
                'slug' => 'post-3-insertOrIgnore',
                'content' => 'first from 2 insertOrIgnore ',
                'excerpt' => 'first from 2 insertOrIgnore ',
                'is_published' => false,
                'min_to_read' => 6,
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'user_id' => 3,
                'title' => 'Post 6 insertOrIgnore',
                'slug' => 'post-6-insertOrIgnore',
                'content' => 'second from 2 insertOrIgnore ',
                'excerpt' => 'second from 2 insertOrIgnore ',
                'is_published' => false,
                'min_to_read' => 4,
                'created_at'    => now(),
                'updated_at'    => now(),
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
