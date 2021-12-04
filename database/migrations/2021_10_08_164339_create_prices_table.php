<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prices', function (Blueprint $table) {
            $table->id();
            $table->decimal('value');
            $table->dateTime('datetime');
            $table->dateTime('datetime_utc');
            $table->dateTimeTz('tz_time');
            $table->integer('geo_id');
            $table->string('geo_name');
            $table->unique(['value','datetime','geo_id'],'precios_hora_dia_zona');
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
        Schema::dropIfExists('prices');
    }
}
