<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adverts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('category_id')->unsigned()->index()->default(0);
            $table->integer('photo_id')->unsigned()->index();
            $table->integer('price')->unsigned()->index();
            $table->biginteger('driven')->unsigned()->index();
            $table->biginteger('yop')->unsigned()->index();
            $table->string('phone');
            $table->date('registered'); 
            $table->string('city');
            $table->string('title');
            $table->text('body');
            $table->biginteger('cubic_capacity')->unsigned()->index();
            $table->string('fuel');
            $table->string('transmission');
            $table->integer('nofs');
            $table->string('ac');
            $table->string('color');
            $table->string('damage');
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
        Schema::dropIfExists('adverts');
    }
}
