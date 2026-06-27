<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function users()
    {
        $users = User::all();

        return view(
            'admin.users.index',
            compact('users')
        );
    }
}