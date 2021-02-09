@extends('layouts.main')
@section('cabecera')
    Listado de tareas
    <a href="{{ route('products.create') }}" class="btn btn-success btn-sm float-right">Nueva tarea</a>
@endsection
@section('contenido')
    <div>
        <form method="POST" action="{{ route('tasks.store') }}">sdfasf
            @csrf

            <div class="form-group row">
                <label for="task-title" class="col-md-4 col-form-label text-md-right">Task title</label>

                <div class="col-md-6">
                    <input id="task-title" type="text"
                        class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title"
                        value="{{ old('title') }}" required autofocus>

                    @if ($errors->has('title'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        Add
                    </button>
                </div>
            </div>
        </form>
    </div>
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
                                <a class="btn btn-warning btn-sm">Editar</a>
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
