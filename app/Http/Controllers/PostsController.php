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
        // With pessimistic locking it ensures that only one data can be insert at the time
        // and data remains consistent and accurate
        DB::transaction(function () {

            $moneyForTransaction = 100;

            $fromMyAccQuery1 = DB::table('users')
            ->where('id', 1)
            ->lockForUpdate() //LOCK THE SELECTED ROW UNTIL TRANSACTION IS COMPLETED
                             // witch will prevent other users from modify same record
            ->decrement('balance', $moneyForTransaction);  

            $toYoursAccQuery2 = DB::table('users') // user:$toYoursAccQuery2 cant modify balance field and he needs to wait 
            ->where('id', 2)                       //  while user:$fromMyAccQuery1 transaction is completed 
            ->increment('balance', $moneyForTransaction); 
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
