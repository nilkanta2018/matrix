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
        Schema::create('childpicked', function (Blueprint $table) {
            $table->id();
            $table->string('child_name');
            $table->date('date_of_birth');
            $table->string('class');
            $table->text('address'); 
            $table->string('city'); 
            $table->string('state'); 
            $table->string('country'); 
            $table->number('zipcode'); 
            $table->string('photo');                        
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
        Schema::dropIfExists('childpicked');
    }
};
