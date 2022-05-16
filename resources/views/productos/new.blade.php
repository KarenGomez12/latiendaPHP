@extends('layouts.menu')

@section('contenido')
<div class="row">
    <form action="" class="col s8" method="Post">
        <div class="row">
            <div class="col s8 input-field">
                <input type="text" id="name" name="nombre" placeholder="nombre de producto"/>
                <label for="nombre">Nombre de Producto</label>
            </div>
        </div> 
        <div class="row">
            <div class="col s8 input-field"> 
                <textarea id="desc" name="desc" class="materialize-textarea"></textarea>
                <label for="desc">Descripción</label>
            </div>
        </div>
        <div class="row">
            <div class="col s8 input-field"> 
                <input type="text" id="precio" name="precio"/>
                <label for="precio">Precio</label>
            </div>
        </div>
        <div class="row">
            <div class="col s8 file-field input-field">
                <div class="btn">
                    <span>Imagen de Producto</span>
                    <input type="file" name="imagen"/>
                </div>
                <div class="file-path-wrapper">
                    <input type="text" class="file-path"/>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection