<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartments', function (Blueprint $table) {
          $table->id();
          $table->unsignedBigInteger('user_id');
          $table->text('titolo' , 50)->nullable();
          $table->boolean('visibilita')->default(1);
          $table->integer('stanze')->nullable();
          $table->integer('posti_letto')->nullable();
          $table->integer('bagni')->nullable();
          $table->integer('dimensioni')->nullable();
          $table->text('descrizione')->nullable();
          $table->string('img' , 255)->nullable();
          $table->string('via')->nullable();
          $table->integer('civico')->nullable();
          $table->string('cap')->nullable();
          $table->string('cita')->nullable();
          $table->string('provincia')->nullable();
          $table->string('paese')->nullable();
          $table->string('lon')->nullable();
          $table->string('lat')->nullable();
          $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('apartments');
    }
}
