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
        // havingRaw() is method to add raw sql query for HAVING condition
        $posts = DB::table('posts')
        ->selectRaw('user_id, SUM(min_to_read) as total_time') // sum() avg() count()...
        ->groupBy('user_id')
        ->havingRaw('SUM(min_to_read) < 8') // HAVING condition `SUM(min_to_read) < 8`
        ->get();

        dd($posts); // return (array) all records that met havingRaw() condition group by user_id
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
