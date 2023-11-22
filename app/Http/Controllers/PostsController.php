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
        // updateOrInsert() update an existing record or insert a new one if it doesn't exist
        // The updateOrInsert method will attempt to locate a matching database record using the first argument's column and value pairs.
        // If the record exists, it will be updated with the values in the second argument
        $posts = DB::table('posts')
            ->updateOrInsert(
                [ // The first argument is the column and value pairs that will be used to find a matching record.
                    'title' => 'New title3', //if this not match it will add new record
                    'slug' => 'new-title3',  //if this not match it will add new record
                    'user_id' => 1           //(not empty)
                ],
                [ // The second argument is the values that will be inserted if the record doesn't exist.
                    'content' => 'It matched title and slug so it will change [content & excerpt]',
                    'excerpt' => 'aaaaaaaa'
                ]
            );
        // return number of rows updated
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
