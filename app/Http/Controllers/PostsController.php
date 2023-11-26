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
        // reorder() remove existing order constrains from query
        // GOOD FOR if you want to apply different order to result set
        $posts = DB::table('posts')
        ->when(function ($query) { 
            return $query->where('title', 'like', '%' . request('search') . '%');// Return collection if where() met condition or it will return all from collection
            // return $query->where('is_published', true);                          //Returns collection only if where() met condition or it will be empty collection
            // return $query->whereFullText('content', request('c'));               //Returns collection only if where() met condition or it will be empty collection
        });

        // $posts = $posts->reorder('id', 'desc')->get(); reorder by id DESC
        $posts = $posts->reorder('title')->get(); // default ASC

        dd($posts); // return reordered collection.
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
