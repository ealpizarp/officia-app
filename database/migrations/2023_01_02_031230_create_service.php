<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateService extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('description');
            $table->boolean('free_diagnosis');
            $table->string('reasons_to_choose');
            $table->string('locations_directions');
            
            //foreing keys
            $table->foreignId('address_id')->constrained('address')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('subcategory_id')->constrained('subcategory')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('user')->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('service');
    }
}
