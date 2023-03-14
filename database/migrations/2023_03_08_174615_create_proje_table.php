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
        Schema::create('proje', function (Blueprint $table) {
          $table->increments('id');
          $table->string('ad');
          $table->integer('musteriler')->unsigned();
          $table->decimal('fiyat');
          $table->text('aciklama');
          $table->date('baslangic');
          $table->date('bitis');
          $table->enum('status', [1,2])->default(1);
          $table->timestamps();

          $table->foreign('musteriler')->references('id')->on('musteri')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proje');
    }
};
