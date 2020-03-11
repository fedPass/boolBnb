<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('options', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('wifi')->default('0');
            $table->tinyInteger('posto_macchina')->default('0');
            $table->tinyInteger('piscina')->default('0');
            $table->tinyInteger('portineria')->default('0');
            $table->tinyInteger('sauna')->default('0');
            $table->tinyInteger('vista_mare')->default('0');
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
        Schema::dropIfExists('options');
    }
}
