<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{


    /**
     * Show Chat
     *
     * @return \Illuminate\Http\Response
     */
    protected function index()
    {
        $users = $this->getUsers();
        return view('message',['users' => $users]);
    }

	/**
     * Fetch all users
     *
     * @return User
     */
    public function getUsers()
    {
        return User::all();
    }


    /**
     * Fetch a user by ID
     *
     * @return User
     */
    protected function getUserbyID(Request $request)
    {
    	$id =  $request->id;
        $user = User::find($id);
		return response()->json($user, 200);
    }
    
}
