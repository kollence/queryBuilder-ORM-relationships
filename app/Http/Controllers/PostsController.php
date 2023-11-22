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
        //If the table has an auto-incrementing id, use the insertGetId method to insert a record and then retrieve the ID:
        $posts = DB::table('posts')
            ->insertGetId([
                    'user_id' => 10,
                    'title' => 'Insert Get Id', 
                    'slug' => 'insert-get-id',
                    'content' => 'Inertuje novi rekord i vraca njegov TEK KREIRAN id',
                    'excerpt' => 'first from / Inertuje novi rekord i vraca njegov TEK KREIRAN id',
                    'is_published' => false,
                    'min_to_read' => 6,
            ]
        );
        //will return ID of inserted new record
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
