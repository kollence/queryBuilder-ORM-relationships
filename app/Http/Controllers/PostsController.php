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
        //pluck() will take just values from given column and return it as array
       $posts = DB::table('posts')
       ->pluck('title');

       dd($posts);
       //result
       /**
        * Illuminate\Support\Collection {#1342 ▼ // app\Http\Controllers\PostsController.php:19
        *   #items: array:10 [▼
        *        0 => "Aliquid quis dicta expedita reprehenderit maiores."
        *        1 => "Dolor enim amet sapiente."
        *        2 => "Est quidem recusandae in sed maxime enim."
        *        3 => "Occaecati est animi ullam eligendi veritatis."
        *        4 => "Quasi aspernatur quia sed quaerat quidem."
        *        5 => "Reprehenderit fugit nesciunt et et harum alias."
        *        6 => "Sequi est consequuntur error unde."
        *        7 => "Sint tempore rerum ipsum deleniti."
        *        8 => "Vel omnis saepe suscipit et facilis voluptatum."
        *        9 => "Velit omnis aut corrupti sed ad doloremque."
        *    ]
        */

       
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
