<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCajonesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('cajones', function (Blueprint $table) {
      $table->id();
      $table->string('description');
      $table->enum('status',['disabled','enabled'])->default('disabled');
      $table->unsignedBigInteger('tipo_id');
      $table->foreign('tipo_id')->references('id')->on('tipos');
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
    Schema::dropIfExists('cajones');
  }
}
