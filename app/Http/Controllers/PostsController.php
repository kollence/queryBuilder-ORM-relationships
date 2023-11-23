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
        // whereNot() adds a basic where clause to the query
        // but excludes condition that is passed to it
        $posts = DB::table('posts')
        ->where('min_to_read', '>', 5) // give me posts that are more then 5 min_to_read    [loosely it will return any matching result]
        ->orWhereNot('is_published', false) // or where not is_published = false            [loosely it will return any matching result]
        ->get(); // get() it needs to give back an array
        // return array of posts where 'min_to_read', '>', 5 || is_published is true
        dd($posts);                               // loosely || return if any of the condition is true
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
