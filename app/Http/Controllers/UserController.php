<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.account', compact('users'));
    }
    public function show()
    {
        $user = Auth::user();
        
        return view('profile', compact('user'));
    }
}
