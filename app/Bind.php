<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Bind extends Model
{
    protected $fillable = ['user_id' , 'binds_to', 'type'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function makeMatch(User $user)
    {

        $binds = Bind::all('user_id', 'binds_to', 'type')
            ->where('user_id', '==', $user->getAuthIdentifier())
            ->where('binds_to', '==', auth()->user()->getAuthIdentifier())
            ->where('type', '==', 'Like');

        if (count($binds))
        {
            DB::table('binds')
                ->where('user_id', auth()->user()->getAuthIdentifier())
                ->where('binds_to', $user->getAuthIdentifier())
                ->update(['type' => "Match"]);
        }
    }
    public static function getMatchedProfiles()
    {
        $userMatches = Bind::all('user_id', 'binds_to', 'type')
            ->where('user_id', auth()->user()->getAuthIdentifier())
            ->where('type', '==', 'Match')
            ->pluck('binds_to');

        return $userMatches;
    }
}
