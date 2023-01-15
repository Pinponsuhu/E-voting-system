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
        Schema::create('voting_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('presidency');
            $table->foreignId('ojo')->nullable();
            $table->foreignId('epe')->nullable();
            $table->foreignId('ikeja')->nullable();
            $table->foreignId('tresurer');
            $table->foreignId('gen_sec');
            $table->foreignId('ass_gen_sec');
            $table->foreignId('welfare');
            $table->foreignId('election_id');
            $table->foreignId('social');
            $table->string('matric_number');
            $table->string('faculty');
            $table->string('campus');
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
        Schema::dropIfExists('voting_histories');
    }
};
