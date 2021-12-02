<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request)
    {
        $users = User::all();

        //generates search results of user(s) from the User's list
        if ($request->has('search')) {
            $users = User::where('username', 'like', "%{$request->search}%")
            ->orWhere('email', 'like', "%{$request->search}%")
            ->get();
        }

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
       User::create([
        'username' => $request->username,
        'first_name' => $request->lastname,
        'last_name' => $request->firstname,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        ]);

        return redirect()->route('users.index')->with('message', 'User Registered Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //this function shows the elected and current data that will be changed 
        //when it is going to be updated.
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        $user->update([
            'username' => $request->username,
            'first_name' => $request->lastname,
            'last_name' => $request->firstname,
            'email' => $request->email,
        ]);

        return redirect()->route('users.index')->with('message', 'User Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if (Auth()->user()->id == $user->id) {
            return redirect()->route('users.index')->with('message', 'You are deleting your own user account!');
        }
        $user->delete();

        return redirect()->route('users.index')->with('message', 'User was Deleted Successfully!');
    }
}
