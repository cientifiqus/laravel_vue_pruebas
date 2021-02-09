@extends('layouts.main')
@section('cabecera')
    Listado de tareas
    <a href="{{ route('products.create') }}" class="btn btn-success btn-sm float-right">Nueva tarea</a>
@endsection
@section('contenido')
    @include('tasks.partials.form')
    @if(!empty($tasks))
        <div class=" py-4">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">
                            Task
                        </th>
                        <th scope="col">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $tasks as $task)
                        <tr>
                            <th scope="row">
                                {{ $task->title }}
                            </th>
                            <th scope="row">
                                <a class="btn btn-warning btn-sm" href="{{ route('tasks.edit_view',$task->id) }}">Editar</a>
                                <a href="javascript:document.getElementById('form_delete_{{ $task->id }}').submit()" class="btn btn-danger btn-sm">Eliminar</a>
                                <form action="{{ route('tasks.destroy', [$task->id]) }}" method="POST" id="form_delete_{{ $task->id }}">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection
