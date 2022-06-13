@extends('layouts.menu')

@section('contenido')
<div class="row">
    <h1 class="">Nuevo Producto</h1>
</div>
<div class="row">
    <form action="{{ route('productos.store')}}" class="col s8" method="Post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col s8 input-field">
                <input type="text" id="nombre" name="nombre" placeholder="nombre de producto"/>
                <label for="nombre">Nombre de Producto</label>
            </div>
        </div> 
        <div class="row">
            <div class="col s8 input-field"> 
                <textarea id="descripcion" name="descripcion" class="materialize-textarea"></textarea>
                <label for="descripcion">Descripción</label>
            </div>
        </div>
        <div class="row">
            <div class="col s8 input-field"> 
                <input type="number" id="precio" name="precio"/>
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
        <div class="row">
            <div class="col s8 input-field">
                <select name="marca" id="marca">
                    @foreach($marcas as $marca)
                    <option value="{{$marca->id}}"> {{$marca ->nombre}}</option>
                    @endforeach
                </select>
                <label >Seleccione Marca</label>
            </div> 
        </div>
        <div class="row">
            <div class="col s8 input-field">
                <select name="categoria" id="categoria">
                    @foreach($categorias as $categoria)
                    <option value="{{$categoria->id}}">{{$categoria ->nombre}}</option>
                    @endforeach
                </select>
                <label >Seleccione Categoria</label>
            </div> 
        </div>
        <div> 
            <button class="btn waves-effect waves-light" type="submit" name="action">Guardar Producto
            <i class="material-icons right">filter_drama</i>
        </div>
        
        <div class="row"></div>
    </form>
</div>
@endsection