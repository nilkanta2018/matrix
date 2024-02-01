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
        Schema::create('pickedup_persion_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('child_id')->constrained('childpicked');
            $table->string('person_name,');
            $table->string('relation');
            $table->integer('contact_no');                      
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
        Schema::dropIfExists('pickedup_persion_details');
    }
};
