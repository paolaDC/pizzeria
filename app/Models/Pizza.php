<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    public $table = 'pizzas';

    public function ingredientes(){
        return $this->belongsToMany(Ingrediente::class, 'pizzas_ingredientes');
    }
}
