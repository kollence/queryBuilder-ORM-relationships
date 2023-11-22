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
                    'title' => 'X', // No change // Title AND/OR slug not changed so it will update existing record 
                    'slug' => 'x',  // No change // Slug AND/OR title not changed so it will update existing record 
                    'content' => 'Update se / Updating fields', // just this will be updated because its changed but value of title & slug are same & unique
                    'excerpt' => 'first from / Updating fields',
                    'is_published' => false,
                    'min_to_read' => 6,
                ],
                [
                    'user_id' => 3,
                    'title' => 'Y 2', // Changed // Title AND/OR slug are changed from Y to Y 2 so it will add new record 
                    'slug' => 'y-2',  // Changed // Slug AND/OR title are changed from y to y-2 so it will add new record
                    'content' => 'Create se / Created new record', // Everything will be created as new record because [Title, Slug] are not unique anymore
                    'excerpt' => 'first from / Created new record',
                    'is_published' => false,
                    'min_to_read' => 6,
                ]
            ], 
            // second argument lists the column(s) that uniquely identify records within the associated table
            ['title', 'slug'] // (Act like its unique identifier)
            // third and final argument is an array of column(s) that should be updated if a matching record already exists in the database
            //['user_id', 'content', 'excerpt', 'is_published', 'min_to_read']
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
