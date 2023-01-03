<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->id();

            $table->integer('legal_id');
            $table->string('name');
            $table->string('last_names');
            $table->integer('phone_number');
            $table->string('email')->unique();
            $table->string('password');
            $table->binary('type')->default(0);//0->Normal user. 1->Admin.
            $table->binary('available')->default(1);

            $table->string('profile_photo')->nullable();
            $table->string('verification_photo')->nullable();

            //foreing keys
            $table->foreignId('address_id')->constrained('address')->onUpdate('cascade')->onDelete('cascade');
            

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
        Schema::dropIfExists('user');
    }
}
