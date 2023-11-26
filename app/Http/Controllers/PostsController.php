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
    {   $role = 'user'; // NOT PASS
        // $role = 'admin'; // PASS
        // when() used for conditional clause.
        // Simplicity cleaner and add conditions only when necessary.
        // Flexibility. Can be used in various situations.
        // :( Can impact performance 
        $posts = DB::table('posts')
        ->when($role == 'admin',function ($query) { // if first parameter was met (bool) callback function will run.
            return $query->where('title', 'like', '%' . request('search') . '%');// Return collection if where() met condition or it will return all from collection
            // return $query->where('is_published', true);                          //Returns collection only if where() met condition or it will be empty collection
            // return $query->whereFullText('content', request('c'));               //Returns collection only if where() met condition or it will be empty collection
        })
        ->get();

        dd($posts); // return empty collection or if some of where() condition were met.
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
