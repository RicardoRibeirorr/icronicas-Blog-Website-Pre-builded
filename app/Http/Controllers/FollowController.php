<?php

namespace Icronica\Http\Controllers;

use Illuminate\Http\Request;

class FollowController extends Controller
{
    public function store(User $user){
        return auth()->user()->following()->toggle($user);
    }
}
