<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{

	/**
     * Fetch all users
     *
     * @return User
     */
    public function getUsers()
    {
        $users = User::all();
        return response()->json($users, 200);
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
