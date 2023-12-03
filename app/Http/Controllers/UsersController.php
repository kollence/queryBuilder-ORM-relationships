<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('id', 'desc')->paginate(10);
        // dd($users);
        return view('users.index', compact('users'));
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
        $user = User::find($request->id);
    }
    
    /**
     * Store a newly created contact resource in storage.
     */
    public function storeContact(Request $request, User $user)
    {
        // you can use create() on relationship contact() where user_id will be set automatically
        $user->contact()->create([
            'address' => $request->address,
            'number' => $request->number,
            'city' => $request->city,
            'zip_code' => $request->zip_code,
        ]);
        
        $users = User::orderBy('id', 'desc')->paginate(10);
        return redirect()->route('users.index')->with('users', $users);
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
