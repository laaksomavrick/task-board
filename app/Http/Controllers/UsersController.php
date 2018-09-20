<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function show()
    {
        $userId = auth()->id();
        return User::find($userId);
    }
}
