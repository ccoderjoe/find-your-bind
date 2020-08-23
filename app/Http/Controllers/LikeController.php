<?php

namespace App\Http\Controllers;

use App\Bind;
use App\User;

class LikeController extends Controller
{
    public function __invoke(User $user)
    {
        $authUser = auth()->user();

        Bind::create([
            'user_id' => $authUser->id,
            'binds_to' => $user->id,
            'type' => 'Like'
        ]);
        $user->binds()->create([
            'user_id' => $user->id,
            'binds_to' => $authUser->id,
            'type' => rand(0 , 1) ? 'Like' : 'Dislike'
        ]);
        Bind::makeMatch($user);


        return redirect()->action('ShowMatchController');

    }
}
