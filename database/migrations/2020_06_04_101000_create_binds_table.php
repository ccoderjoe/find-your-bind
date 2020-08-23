<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBindsTable extends Migration
{

    public function up(): void
    {
        Schema::create('binds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('binds_to');
            $table->string('type');
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->unique(['user_id', 'binds_to']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('binds');
    }
}
