<?php

namespace App\Http\Controllers;


class ShowUserGalleryController extends Controller
{
    public function __invoke()
    {
        $user = auth()->user();

        $pictures = $user->pictures()->get();

        return view('gallery', [
            'pictures' => $pictures,
            'user' => $user
        ]);
    }
}
