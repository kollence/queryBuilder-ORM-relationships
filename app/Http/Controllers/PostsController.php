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
    {   //GOOD FOR PROCESS DATA RETURNED FROM QUERY 
        //useful for performing calculation, filtering data, or transforming data in different format
        
        // chunk() Chunking large set of data. Retrieves data in smaller & more manageable set.
        // chunking second param callback function can be use for ANY PROCESSING OF DATA THAT YOU WANT
        // BROWSER will load all time till the last chunk of data is not processed
        // BETTER THEN PAGINATE = (paginate retrieve everything from database and then chunk result in pages)
        // BETTER FOR PERFORMANCE
        $posts = DB::table('posts')
        ->orderByDesc('id')
        ->chunk(100, function($posts) { // param 1: number of chunked rows. param 2: callback function receive num of chunked rows
                                      //once call back are finished processing it will move to next coming chunked set
                                      //running till last chunk is loaded
            foreach($posts as $post){
                dump($post); //DUMP() a post so you could watch process and not killing it
            }
        });

        
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
