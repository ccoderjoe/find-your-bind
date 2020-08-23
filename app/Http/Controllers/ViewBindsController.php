<?php

namespace App\Http\Controllers;

use App\User;

class ViewBindsController extends Controller
{
    public function __invoke()
    {
        $user = auth()->user();

        $profiles = User::getMatchedProfiles();

        return view('binds', [
            'user' => $user,
            'profiles' => $profiles
        ]);
    }
}
