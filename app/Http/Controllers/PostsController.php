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
        // offset($number) Used to offset the number of rows by skipping them from beginning of collection.
        // $number is argument that receives the number of rows you want to skip.
        // It is often used in conjunction with the limit method to paginate through a set of records.
        $posts = DB::table('posts')
        ->where('id', '>', 500) // where(column, operator, value)
        ->offset(10) //offset for 10 rows and start from id:511
        ->limit(10) //limit for 10 rows end with id:520
        ->get();

        dd($posts); // return collection that are skipped 10 rows from beginning of collection.
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
