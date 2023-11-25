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
        // I want to take all posts but group them by day of creation, `created_at`. but group them by 24h apart
        // use the DATE_ADD and DATE_FORMAT functions in MySQL to create groups based on 24-hour intervals.
        $posts = DB::table('posts')
        ->selectRaw("DATE_FORMAT(DATE_ADD(created_at, INTERVAL 24 HOUR), '%Y-%m-%d %H:00:00') AS posts_creation_day, COUNT(*) AS total_posts") // select() accepts params and not raw sql query
        // First column: posts_creation_day
        // DATE_ADD(created_at, INTERVAL 24 HOUR) adds a 24-hour offset to the created_at timestamp
        // DATE_FORMAT(..., '%Y-%m-%d %H:00:00') formats the adjusted timestamp to include only the year, month, day, and hour
        
        // Second column: total_posts
        // COUNT(*) counts all rows in the table and storing result in total_posts
        ->groupByRaw('posts_creation_day')
        // GROUP BY RAW accepts raw SQL for query string for `GROUP BY`
        ->get();

        dd($posts); // return (array) of grouped results with given fields: `posts_creation_day`, `total_posts`
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
