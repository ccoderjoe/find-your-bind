<?php

use App\Bind;
use App\Picture;
use App\User;
use Illuminate\Database\Seeder;

class AppSeeder extends Seeder
{

    public function run()
    {
        $users = factory(User::class, 200)->make();

        foreach ($users as $user) {

            $user->save();

            $this->generatePictures($user);

//            $this->generateBinds($user);

        }
    }

    private function generatePictures(User $user)
    {
        factory(Picture::class, rand(2, 10))
            ->make()
            ->each(function (Picture $picture) use ($user) {
                $picture->user()->associate($user);
                $picture->save();
            });
    }

    private function generateBinds(User $user)
    {
        factory(Bind::class, 10)
            ->make()
            ->each(function (Bind $bind) use ($user) {
                $bind->user()->associate($user);
                $bind->save();
            });
    }
}
