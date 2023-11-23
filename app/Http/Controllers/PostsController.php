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
        // Without pessimistic locking danger of uncontrolled entering of data and transactions at any time and overwrite each other changes 
        // without knowing witch is the last one
        DB::transaction(function () {

            $moneyForTransaction = 100;

            $fromMyAccQuery1 = DB::table('users')->where('id', 1)->decrement('balance', $moneyForTransaction); // if this user call action uncontrollably 
                                                                                                               // they will overwrite each other changes 

            $toYoursAccQuery2 = DB::table('users')->where('id', 2)->increment('balance', $moneyForTransaction); // if this user call action uncontrollably
        });                                                                                                     // they will overwrite each other changes
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
