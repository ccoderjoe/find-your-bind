<?php

namespace App\Http\Controllers;

use App\User;

class ViewUserGalleryController extends Controller
{
    public function __invoke(User $user)
    {
        $pictures = $user->pictures()->get();

        return view('usersGallery', [
            'user' => $user,
            'pictures' => $pictures
        ]);
    }
}
