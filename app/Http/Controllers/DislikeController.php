<?php

namespace App\Http\Controllers;

use App\Bind;
use App\User;

class DislikeController extends Controller
{
    public function __invoke(User $user)
    {
        $authUser = auth()->user();

        Bind::create([
            'user_id' => $authUser->id,
            'binds_to' => $user->id,
            'type' => 'Dislike'
        ]);
        $user->binds()->create([
            'user_id' => $user->id,
            'binds_to' => $authUser->id,
            'type' => rand(0 , 1) ? 'Like' : 'Dislike'
        ]);

        return redirect()->action('ShowMatchController');

    }
}
