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
        //The upsert method will insert records that do not exist and update the records that already exist with new values that you may specify.
        $posts = DB::table('posts')
            ->upsert(
            [
                [
                    'user_id' => 2,
                    'title' => 'X', 
                    'slug' => 'x',
                    'content' => 'Update se / Updating fields',
                    'excerpt' => 'first from / Updating fields',
                    'is_published' => false,
                    'min_to_read' => 6,
                ],
                [
                    'user_id' => 4,
                    'title' => 'Y 4',
                    'slug' => 'y-C',
                    'content' => 'Up? eate se / Created new record',
                    'excerpt' => 'Apdejt from / Created new record',
                    'is_published' => false,
                    'min_to_read' => 6,
                ]
            ], 
            // ALREADY KNOWS THAT THIS FIELD NEED TO BE UNIQUE, SO WE ACT LIKE PRIMARY KEY
            // IT KNOWS BECAUSE ITS SET IN MIGRATION FILE AS $table->unique(['title', 'slug'])
            ['title, slug'], // (Act like its unique identifier)
            // third and final argument is an array of column(s) that should be updated if a matching record already exists in the database
            // ['title', 'slug', 'excerpt']
        );
        //will return 0 if nothing to add or update or number of records updated
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
