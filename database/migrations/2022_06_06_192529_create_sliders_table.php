<?php

use App\Models\Slider;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedInteger('order');
            $table->string('image');
            //1 ACTIVO, 0 INACTIVO
            $table->enum('status',[Slider::ACTIVO, Slider::INACTIVO])->default(Slider::INACTIVO);
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
        Schema::dropIfExists('sliders');
    }
}
