<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AddPictureToUserGalleryController extends Controller
{
    public function __invoke(Request $request)
    {
        /** @var User $user */
        $user = auth()->user();

        $user->pictures()->create([
            'name' => $request->get('picture'),
            'location' => $request->file('picture')
            ->store('/public/profilePicture'),
        ]);

        return redirect()
            ->back();
    }
}
