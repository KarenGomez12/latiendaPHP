<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//primera ruta en laravel 
Route:: get('hola', function(){echo "hola"; 
});

//segunda ruta en laravel 
Route:: get('arreglos', function(){
    $estudiantes = ["NU"=>"Ana", 
     "JU"=>"Juana",
     "AN"=>"Angela"];
    echo "<pre>";
    var_dump($estudiantes);
    echo "</pre>";
    echo "<hr />";

    //agregar posición
    $estudiantes["CR"] = "Cristian";
    echo "<pre>";
    var_dump($estudiantes);
    echo "</pre>";

    //retirar elemnetos de arreglo
    echo "<hr/>";
    unset($estudiantes["JU"]);
    echo "<pre>";
    var_dump($estudiantes);
    echo "</pre>";
});

//tercera(prueba) ruta en laravel 
Route:: get('paises', function(){
  $paises = ["Colombia" =>[
                    "capital"=> "Bogota",
                    "moneda" => "Peso",
                    "poblacion" => 51.6,
                    "ciudades" => [
                        "Bogotá",
                        "Medellín",
                        "Cali"
                    ]
            ],
            "Peru"=>[
                    "capital"=> "Lima",
                    "moneda" => "Sol",
                    "poblacion" => 32.97,
                    "ciudades" => [
                        "Cuzco",
                        "Piura"
                    ]
            ],
            "Paraguay"=>[
                    "capital"=> "Asuncion",
                    "moneda" => "Guarani",
                    "poblacion" => 7.1,
                    "ciudades" => [
                        "Ciudad del este",
                        "Medellín",
                        "Cali"
                    ]
            ],
];
 /* echo "<pre>";
  var_dump($paises);
  echo "</pre>";
  echo "<hr />";
  */

 //conexion de datos en plural y singular para el recorrido del array

 /*foreach($paises as $pais => $infopais){
     echo"<h1> $pais </h1>";
     //foreach interno
      foreach($infopais as $clave => $valor){
          echo "$clave : $valor <br/>";
      }
     //para mostrar cada indice indicado
     echo "capital: " .$infopais ["capital"];
     echo "moneda: " .$infopais ["moneda"];
     echo "poblacion: " .$infopais ["poblacion"];
     echo "<hr/>";
    }*/

    //mostrar la vista de paises
    return view('paises')
     ->with("paises" , $paises);
});