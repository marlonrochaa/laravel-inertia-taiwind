<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->has('search') ? $request->get('search') : null;
        
        $users = User::when($search, function($users, $search) {
            $users->where('name','like', '%'.$search.'%');
        })->paginate(10);

        return Inertia::render('Dashboard',[
            'users' => $users,
            'search' => $search,
        ]);
    }
}
