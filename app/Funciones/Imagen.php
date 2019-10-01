<?php
namespace App\Funciones;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class Imagen {

    public static function file_to_base64($name_file){
        $img = file_get_contents($name_file);
        $base64 = base64_encode($img);
        return $base64;
    }

    public static function guardarFicheroBase64($file, $nombre, $ruta){
        Storage::disk('recursos')->makeDirectory($ruta);
        Imagen::base64_to_file($file, $ruta . '\\' . $nombre);
    }

    public static function base64_to_file($base64_string, $name_file) {
        $ifp = fopen($name_file, "wb");
        fwrite($ifp, base64_decode($base64_string));
        fclose($ifp);
        return $name_file;
    }

    public static function Guardar($ruta, $nombre, $contenido){
        Storage::disk('recursos')->makeDirectory($ruta);
        Storage::disk('recursos')->put($ruta . '\\'. $nombre, $contenido);
    }

    public static function eliminarDirectorio($directorio){
        Storage::disk('recursos')->deleteDirectory($directorio);
    }

    public static function eliminarImagen($ruta){
        File::delete($ruta);
    }
}

