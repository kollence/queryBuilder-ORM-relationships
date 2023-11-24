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
        // sharedLock() query builder is used to apply a shared lock to the rows that are being selected
        // This lock prevents other database connections from modifying the rows until the transaction is committed or rolled back.
        DB::transaction(function () {

            $moneyForTransaction = 1000;

            $fromMyAccQuery1 = DB::table('users')
            ->where('balance', '<', 5)
            ->sharedLock() // shared lock is applied to the rows in the 'users' table that meet the condition where the 'balance' < '5'.
                           // This means that other database connections can read the rows, but they cannot modify them until the lock is released.
            ->decrement('balance', $moneyForTransaction);  

            $toYoursAccQuery2 = DB::table('users') // user:$toYoursAccQuery2 cant modify balance field and he needs to wait 
            ->where('balance', '>=', 5)                       //  while user:$fromMyAccQuery1 transaction is completed 
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
