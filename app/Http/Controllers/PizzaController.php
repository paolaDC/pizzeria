<?php

namespace App\Http\Controllers;

use App\Funciones\Imagen;
use App\Models\Pizza;
use Illuminate\Http\Request;

class PizzaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $pizzas=Pizza::with('ingredientes')->get();

        $catalogo=new \stdClass();
        $catalogo=[];

        foreach ($pizzas as $pizza){
            $articulo=new \stdClass();

            $articulo->id=$pizza->id;
            $articulo->nombre=$pizza->nombre;

            //calculo el precio de la pizza
            $precio=$pizza->ingredientes->sum('precio')*1.50;
            $articulo->total=$precio;
            $catalogo[]=$articulo;
        }

        return view('home', compact('catalogo'));
    }
}
