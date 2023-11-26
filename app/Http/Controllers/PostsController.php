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
        // limit($number) Used to LIMIT the number of rows returned by a query.
        // $number is argument that receives the number of rows you want to limit.
        $posts = DB::table('posts')
        ->selectRaw("DATE_FORMAT(DATE_ADD(created_at, INTERVAL 4 HOUR), '%Y-%m-%d %H:00:00') AS posts_creation_day, COUNT(*) AS total_posts")
        ->groupBy('posts_creation_day')
        ->limit(10) //Limit for 10 rows
        ->get();
        dd($posts); // return collection that are limited on some amount
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
