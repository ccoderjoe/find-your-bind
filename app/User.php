<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;


class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'profile_picture',
        'surname', 'gender', 'location', 'min_age',
        'max_age', 'looking_male', 'looking_female', 'age',
        'description'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function pictures()
    {
        return $this->hasMany(Picture::class);
    }

    public function binds()
    {
        return $this->hasMany(Bind::class);
    }

    public function getProfilePicture(): string
    {
        return Storage::url($this->profile_picture);
    }


    public static function getReadyProfilesForMatch()
    {
        $user = auth()->user();

        $binds = Bind::all('user_id', 'binds_to')
            ->where('user_id', '==', $user->getAuthIdentifier());


        $users = User::all()
            ->whereBetween('age', [$user->max_min, $user->max_age])
            ->where('id', '<>', auth()->id());


        foreach ($binds as $bind)
        {
            $users = $users->where('id' ,'<>', $bind->getAttribute('binds_to'));
        }

        if($user->looking_male && !$user->looking_female)
        {
            $users = $users->where('gender', '==', 'men');
        }

        if($user->looking_female && !$user->looking_male)
        {
            $users = $users->where('gender', '==', 'women');
        }

        if (count($users) == 0)
        {
            return false;
        }

         return $users->random();

    }

    public static function getMatchedProfiles()
    {
        $profileId = Bind::getMatchedProfiles();

        return $profiles = User::all()
            ->find($profileId);

    }

    public static function getRandomProfiles()
    {
        return User::all('id','name', 'age', 'profile_picture', 'location', 'description')
            ->where('id', '<>', auth()->id())
            ->random(15)
            ->forPage(0 , 15);
    }
}
