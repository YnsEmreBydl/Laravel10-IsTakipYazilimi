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
        Schema::create('hizmet', function (Blueprint $table) {
          $table->increments('id');
          $table->string('hizmetad');
          $table->integer('musteriler')->unsigned();
          $table->decimal('hizmetfiyat');
          $table->date('hizmetbaslangic');
          $table->date('hizmetbitis');
          $table->enum('hizmetstatus', [1,2])->default(1);
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
        Schema::dropIfExists('hizmet');
    }
};
