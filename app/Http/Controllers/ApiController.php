<?php

namespace App\Http\Controllers;

use App\Funciones\Imagen;
use App\Models\Pizza;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Exception;

class ApiController extends Controller
{
    public function getCatalogo(){
        $pizzas=Pizza::with('ingredientes')->get();
        if(!$pizzas){
            return response()->json(['error' => 'El catálogo de pizzas aún está vacío'], 404);
        }

        $catalogo=new \stdClass();
        $catalogo->pizzas=[];

        foreach ($pizzas as $pizza){
            $articulo=new \stdClass();

            $articulo->nombre=$pizza->nombre;

            //calculo el precio de la pizza
            $precio=$pizza->ingredientes->sum('precio')*1.50;
            $articulo->total=$precio;

            //paso la imagen a base 64
            if ($pizza->imagen){
                if (file_exists($pizza->imagen)){
                    $articulo->imagen=Imagen::file_to_base64($pizza->imagen);
                }
                else{
                    $articulo->imagen="El recurso se ha movido o no existe.";
                }
            }

            $articulo->ingredientes=$pizza->ingredientes;

            $catalogo->pizzas[]=$articulo;
        }

        return response()->json($catalogo);
    }

    public function getPizza(Request $request){
        try{

            $pizza=Pizza::with('ingredientes')->where('id', $request->get('id'))->first();

            if(!empty($pizza) && !is_null($pizza)){
                if (!empty($pizza->imagen)){
                    if (file_exists($pizza->imagen)){
                        $pizza->imagen=Imagen::file_to_base64($pizza->imagen);
                    }
                    else{
                        $pizza->imagen="El recurso se ha movido o no existe.";
                    }
                }
                return response()->json($pizza, 200);
            }
            else{
                return response()->json(['error'=>'El identificador de la pizza indicada no existe o no tiene permisos para visualizarla.'], 200);
            }
        }
        catch (Exception $ex){
            return response()->json(['error'=>$ex], 500);
        }
    }

    public function postNuevaPizza(Request $request){
        try {
            $pizza= new Pizza();
            $pizza->nombre= $request->get('nombre');

            if ($request->has('imagen')){
                $nombreFichero= str_replace(' ','_', $pizza->nombre) . '.jpg';
                $ruta =Storage::disk('recursos')->getDriver()->getAdapter()->getPathPrefix();
                Imagen::guardarFicheroBase64($request->get('imagen'), $nombreFichero, $ruta);
                $pizza->imagen= $ruta . '\\' . $nombreFichero;
            }

            $pizza->save();
            return response()->json(['resultado' => 'OK'],200);
        }

        catch(Exception $ex) {
            return response()->json(['error' => $ex], 500);
        }

    }

    public function postEditarPizza(Request $request){
        try {
            $pizza= Pizza::find($request->get('id'));

            if(!$pizza){
                return response()->json(['error' => 'La pizza indicada no se encuentra en el sistema.'], 404);
            }

            $pizza->nombre= $request->get('nombre');

            if ($request->has('imagen')){
                $nombreFichero= str_replace(' ','_', $pizza->nombre) . '.jpg';
                $ruta =Storage::disk('recursos')->getDriver()->getAdapter()->getPathPrefix();
                Imagen::guardarFicheroBase64($request->get('imagen'), $nombreFichero, $ruta);
                $pizza->imagen= $ruta . '\\' . $nombreFichero;
            }

            $pizza->save();
            return response()->json(['resultado' => 'OK'],200);
        }

        catch(Exception $ex) {
            return response()->json(['error' => $ex], 500);
        }

    }

    public function postBorrarPizza(Request $request){
        try {
            $pizza= Pizza::find($request->get('id'));

            if(!$pizza){
                return response()->json(['error' => 'La pizza indicada no se encuentra en el sistema.'], 404);
            }

            if ($pizza->imagen){
                Imagen::eliminarImagen($pizza->imagen);
            }

            $pizza->delete();
            return response()->json(['resultado' => 'OK'],200);
        }

        catch(Exception $ex) {
            return response()->json(['error' => $ex], 500);
        }

    }



}
