<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function __construct()
    {
        //$this->middleware( middleware:'auth'); //usar esto, si no empleo el middleware en Route...
    }

    /**
     * Display a list of all of the user's task
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $tasks = $request->user()->tasks()->orderBy('created_at','desc')->get();
        return view('tasks.index',['tasks' => $tasks]);
    }

    /**
     * Create a new task
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //dd($request);//como un var_dump pero formateado y estilos
        $this->validate($request, [//validacion de campos del formulario
            'title' => 'required|max:255',
        ]);//si falla, automaticamente se va  a redirigir al formulario

        $request->user()->tasks()->create([
            'title' => $request->title,
        ]);

        return redirect('tasks');
    }

    public function destroy($id){

    }
}
