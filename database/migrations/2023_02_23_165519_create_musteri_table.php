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
        Schema::create('musteri', function (Blueprint $table) {
          $table->increments('id');
          $table->string('adsoyad');

          $table->string('telefon');
          $table->string('mail');
          $table->string('il');
          $table->string('ilce');
          $table->text('adres');
          $table->string('meslek');
          $table->enum('musteristatus',[1,2])->default(1);

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
        Schema::dropIfExists('musteri');
    }
};
