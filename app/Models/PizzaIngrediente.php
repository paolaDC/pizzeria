<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    public $table = 'pizzas_ingredientes';

    public function ingredientes(){
        return $this->hasManyThrough(Ingrediente::class, 'pizzas_ingredientes')->withTimestamps();
    }
}
