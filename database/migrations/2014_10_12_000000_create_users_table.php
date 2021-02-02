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
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('username')->unique();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('biography')->nullable();
            $table->string('phone')->nullable();
            $table->string('birthday')->nullable();
            $table->string('credit_card')->nullable();
            $table->string('city')->nullable();
            $table->enum('gender', [0, 1, 2])->default(2);
            $table->string('website')->nullable();
            $table->enum('subscription', [0, 1])->nullable();
            $table->string('profile_image')->nullable();
            $table->string('cover_image')->nullable();
            $table->enum('theme', [1, 2])->default(1);
            $table->enum('type', [0, 1])->default(0);
            $table->enum('active', [0, 1])->default(0);
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
