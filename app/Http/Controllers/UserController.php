<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('users.index', [
            'users'             =>  User::with('posts')->latest()->paginate()
        ]);
    }

    public function show(User $user)
    {
        return view('users.show', [
            'user'              =>  $user
        ]);
    }

}
