<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarchandTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marchands', function (Blueprint $table) {
            $table->id();
            $table->string('nom_marchand');
            $table->string('prenom_marchand');
            $table->integer('CIN')->unique();
            $table->string('tel')->nullable();
            $table->string('login')->unique();
            $table->string('password');
            $table->string('adresse_marchand')->nullable();
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
        Schema::dropIfExists('marchand');
    }
}
