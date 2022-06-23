<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Marca;
use App\Models\Categoria;
//dependencia para el validador 
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;


class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo"Aquí va la lista de productos";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //echo "Aquí va el from para registar producto ";

        //selecionar marcas;
        $marcas = Marca::all();
        //selecionar marcas y categorias de bd;
        $categorias = Categoria::all();
        //las enviamos a la vista
        return view('productos.new')
                ->with('categorias' , $categorias)
                ->with('marcas' , $marcas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //VALIDACIÓN DE DATOS DEL FORMULARIO
        //1. Establecer las reglas de validación a apliacar para la ´input data´
        $reglas = [
            "nombre" =>'required|alpha|unique:productos,nombre',
            "descripcion" =>'required|min:10|max:20',
            "precio" =>'required|numeric',
            "imagen"=>'required|image',
            "categoria"=> 'required',
            "marca"=> 'required'
        ];

        $mensajes=[
            "required" =>"Campo obligatorio",
            "alpha" => "Solo letras",
            "numeric" => "Solo números",
            "image" => "Se debe incluir imagen",
            "min" => "mínimo valor :min",
            "max" => "máximo valor :max"
        ];

        //2. Crear objeto validador 
        $v = validator::make($request-> all(),$reglas,$mensajes);
        //3. Validar
            //metodo fails() retorna:
            //true: si la validación falla 
            //false si los dats son validos 
            //die(var_dump($v->fails()));
            if ($v->fails() ){
                //validacion incorrecta 
                //mostar la vista new
                //llevando los errores
                return redirect('productos/create')
                ->withErrors($v);
               // var_dump($v->errors());
            }
            else{
                    //validacion correcta

                    //acceder a los datos del formulario
                //utilizando el obejto $request
                //echo"<pre>";
                    //para que nos muetsre todos los campos
                    //var_dump($request->all());
                    //para que nos muetsre el campo que queramos
                    //var_dump($request->nombre);
                //echo"</pre>";
                //crear el obejto UploardedFile
                $archivo = $request->imagen;
                //capturar el nombre "original" del archivo
                //desde el cliente
                $nombre_archivo = $archivo->getClientOriginalName();
                //var_dump($nombre_archivo);
                //mover el archivo a la carpeta "public/img"
                $ruta = public_path();
                $archivo->move("$ruta/img", $nombre_archivo);
                //registrar producto en la base de datos 
                $producto = new Producto;
                $producto->nombre = $request->nombre;
                $producto->descrpcion = $request->descripcion;
                $producto->precio = $request->precio;
                $producto->imagen = $nombre_archivo;
                $producto->marca_id = $request ->marca;
                $producto->categoria_id = $request ->categoria;
                $producto->save();
                //redireccionar al formulario
                //llevando un mensaje de exito 
                return redirect('productos/create')
                ->with("mensajito", "Producto Registrado");
            }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show($producto)
    {
        echo "Aquí va el detalle de prodcuto con id: $producto";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit($producto)
    {
        echo "Aquí va el from para editar producto con id: $producto";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        //
    }
}
