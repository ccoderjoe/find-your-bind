<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UpdateUserProfileController extends Controller
{
    public function __invoke(Request $request)
    {
        /** @var User $user */
        $user = auth()->user();

        $user->update([
            'name' => $request->get('name') ? $request->get('name') : $user->getAttribute('name'),
            'surname' => $request->get('surname') ? $request->get('surname') : $user->getAttribute('surname'),
            'email' => $request->get('email') ? $request->get('email') : $user->getAttribute('email'),
            'password' => $request->get('password') ? Hash::make($request->get('password')) : $user->getAttribute('password'),
            'age' => $request->get('age') ? $request->get('age') : $user->getAttribute('age'),
            'location' => $request->get('location') ? $request->get('location') : $user->getAttribute('location'),
            'gender' => $request->get('gender') == 'men' ? 'men' : 'women',
            'min_age' => $request->get('min_age') ? $request->get('min_age') : $user->getAttribute('min_age'),
            'max_age' => $request->get('max_age') ? $request->get('max_age') : $user->getAttribute('max_age'),
            'looking_male' => $request->exists('looking_male'),
            'looking_female' => $request->exists('looking_female')
        ]);

        return redirect()
            ->back();

    }
}
