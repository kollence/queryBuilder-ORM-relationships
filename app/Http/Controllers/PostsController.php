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
        // I want to take average from column min_to_read and group them by users that have created that posts
        // use the DATE_ADD and DATE_FORMAT functions in MySQL to create groups based on 24-hour intervals.
        $posts = DB::table('posts')
        ->select("user_id", DB::raw('AVG(min_to_read) as average_time_to_read')) // select() accepts params and for raw sql query you need to pass DB::raw()
        // First column: user_id
        // Second column: average_time_to_read
        // DB::raw raw SQL to take AVG from column min_to_read

        ->groupByRaw('user_id')
        // GROUP BY RAW accepts raw SQL for query string for `GROUP BY`
        ->get();

        dd($posts); // return (array) of grouped results with given fields: (int)`user_id`, (float)`average_time_to_read`
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
