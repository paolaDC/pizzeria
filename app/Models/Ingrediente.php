<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ingrediente extends Model
{
    public $table = 'ingredientes';

    public function pizzas(){
        return $this->belongsToMany(Pizza::class, 'pizzas_ingredientes');
    }

}
