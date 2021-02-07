@extends('layouts.main')
@section('cabecera')
    Crear producto
    <a href="{{ route('products.create') }}" class="btn btn-success btn-sm float-right">Nuevo producto</a>
@endsection
@section('contenido')
    <form action="{{ route('products.store') }}" method="POST">
        @csrf <!-- para autenticar el envio de este formulario en laravel, mediante plantillas blade -->
        <div class="form-group">
            <label for="description">Descripción</label>
            <input type="text" class="form-control" name="description">
        </div>
        <div class="form-group">
            <label for="price">Precio</label>
            <input type="number" class="form-control" name="price">
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('products.index') }}" class="btn btn-danger">Cancelar</a>
    </form>
@endsection
