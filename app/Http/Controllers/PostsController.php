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
        // If all transactions are done, data will be changed in every query that it needs to
        // but if it fails in any of multiple queries, data will not be updated and
        // every thing will be back to previous state `undo`
        DB::transaction(function () {

            $moneyForTransaction = 100;

            $fromMyAccQuery1 = DB::table('users')->where('id', 1)->decrement('balance', $moneyForTransaction);

            $toYoursAccQuery2 = DB::table('users')->where('id', 2)->increment('balance', $moneyForTransaction); // if this for some reason dont succeed 
                                                                                                                // $fromMyAccQuery1 will undo and it will not decrement
                                                                                                                // for $moneyForTransaction
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
