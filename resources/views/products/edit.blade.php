@extends('layouts.main')
@section('cabecera')
    Editar producto
    <a href="{{ route('products.create') }}" class="btn btn-success btn-sm float-right">Nuevo producto</a>
@endsection
@section('contenido')
    <form action="{{ route('products.update', $Product->id) }}" method="POST">
        @method('put')
        @csrf
        <!-- para autenticar el envio de este formulario en laravel, mediante plantillas blade -->
        <div class="form-group">
            <label for="description">Descripción</label>
            <input type="text" class="form-control" name="description" value="{{ $Product->description }}">
        </div>
        <div class="form-group">
            <label for="price">Precio</label>
            <input type="number" class="form-control" name="price" value="{{ $Product->price }}">
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('products.index') }}" class="btn btn-danger">Cancelar</a>
    </form>
@endsection
