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
        // lazy() LAZY LOAD DATA is used to retrieve a large number of records WITHOUT OVERWHELMING THE SERVER MEMORY
        // return LazyCollection and not regular collection
        // LazyCollection class in Laravel is designed for working with large datasets in a memory-efficient manner.
        // LazyCollection When you iterate over the lazy collection, the underlying query is executed in chunks, loading only a portion of the results into memory at a time
        $posts = DB::table('posts')
        ->orderByDesc('id')
        ->lazy();


        dd($posts); // return Illuminate\Support\LazyCollection
                    // with default chunk of 1000 records (->source->use->$chunkSize = 1000)
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
