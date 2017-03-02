<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminUsersController extends Controller
{
    public function index()
    {
    	$users = User::all();

    	foreach ($users as $user) {
    		$user->role = $user->roles()->first();
    	}

    	return view('adminpanel.users.index',compact('users'));
    }
}
