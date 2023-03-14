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
        Schema::create('bildirim', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('odemeler')->unsigned();
            $table->integer('domainler')->unsigned();
            $table->integer('hostingler')->unsigned();
            $table->integer('projeler')->unsigned();
            $table->timestamps();

            $table->foreign('odemeler')->references('id')->on('odeme')->onDelete('cascade');
            $table->foreign('domainler')->references('id')->on('domain')->onDelete('cascade');
            $table->foreign('hostingler')->references('id')->on('hosting')->onDelete('cascade');
            $table->foreign('projeler')->references('id')->on('proje')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bildirim');
    }
};
