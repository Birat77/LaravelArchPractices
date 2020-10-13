<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

    public function index()
    {
        return response()->json([
            'users' => User::all(),
        ]);
    }
}
