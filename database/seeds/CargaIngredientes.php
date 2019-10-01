<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CargaIngredientes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ingredientes')->insert([[
            'nombre' => 'harina',
            'precio' => 1.50],
            [
                'nombre' => 'tomate',
                'precio' => 2.50],
            [
                'nombre' => 'mozzarella',
                'precio' => 4.75],
            [
                'nombre' => 'sal',
                'precio' => 1.00],
            [
                'nombre' => 'pepperoni',
                'precio' => 4.50],
            [
                'nombre' => 'roquefort',
                'precio' => 3.45],
            [
            'nombre' => 'cebolla',
            'precio' => 2.10]
            ]
            );
    }
}
