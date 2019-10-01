<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePizzasIngredientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pizzas_ingredientes', function (Blueprint $table) {
            $table->bigInteger('pizza_id',false,true);
            $table->bigInteger('ingrediente_id', false, true);

            $table->primary(['pizza_id', 'ingrediente_id']);

            $table->foreign('pizza_id')
                ->references('id')->on('pizzas');

            $table->foreign('ingrediente_id')
                ->references('id')->on('ingredientes');

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
        Schema::dropIfExists('pizzas_ingredientes');
    }
}
