<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recruitments', function (Blueprint $table) {
            $table->increments('id');

            $table->string('email');
            $table->string('nameBusiness');
            
            $table->string('name');
            $table->string('position');
            $table->string('area');

            $table->string('title');
            $table->string('major');

            $table->string('type');
            $table->string('gender');
            $table->string('rank');
            $table->string('exp');
            $table->string('currency');
            $table->string('wage');

            $table->string('detail');
            $table->string('require');
            $table->string('benefit');
            
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
        Schema::dropIfExists('recruitments');
    }
};
