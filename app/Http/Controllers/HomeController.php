<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\User;

=======
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
>>>>>>> parent of f4154eb... second commit

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $user = auth()->user();

<<<<<<< HEAD
        $profiles = User::getRandomProfiles();

        return view('home' , [
            'profiles' => $profiles,
=======
        return view('home' , [
>>>>>>> parent of f4154eb... second commit
            'user' => $user
        ]);
    }
}
