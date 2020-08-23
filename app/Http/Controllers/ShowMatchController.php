<?php

namespace App\Http\Controllers;

use App\User;

class ShowMatchController extends Controller
{
    public function __invoke()
    {
        $user = auth()->user();

        if (User::getReadyProfilesForMatch()) {
            $profile = User::getReadyProfilesForMatch();
        } else {
            $profile = false;
        }


        return view('match', [
            'profile' => $profile
        ]);
    }
}
