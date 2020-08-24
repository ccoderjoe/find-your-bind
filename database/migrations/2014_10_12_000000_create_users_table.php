<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->unsignedBigInteger('age')->default(18);
            $table->string('profile_picture')->nullable();
            $table->string('gender')->default('men');
            $table->string('location')->default('Riga');
            $table->unsignedBigInteger('min_age')->default(18);
            $table->unsignedBigInteger('max_age')->default(30);
            $table->boolean('looking_male')->default(true);
            $table->boolean('looking_female')->default(true);
            $table->string('description')->nullable();

            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
