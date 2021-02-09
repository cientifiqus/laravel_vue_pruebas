<?php

namespace App\Http\Controllers;

use App\Task;
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
        $tasks = $request->user()->tasks()->orderBy('created_at', 'desc')->get();
        return view('tasks.index', ['tasks' => $tasks]);
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
        $this->validate($request, [ //validacion de campos del formulario
            'title' => 'required|max:255',
        ]); //si falla, automaticamente se va  a redirigir al formulario

        $request->user()->tasks()->create([
            'title' => $request->title,
        ]);

        return redirect('tasks');
    }

    public function edit(Request $request)
    {
        //dd($request);//como un var_dump pero formateado y estilos
        $this->validate($request, [ //validacion de campos del formulario
            'title' => 'required|max:255',
        ]); //si falla, automaticamente se va  a redirigir al formulario

        $Task = Task::find($request->id);
        $this->authorize('edit', $Task);//Validando politica, metodo edit()
        if (!empty($Task)) {
            $Task->title = $request->title;
            $Task->save();
        }

        return redirect('tasks');
    }

    public function editView($id)
    {
        $Task = Task::find($id);
        $this->authorize('edit', $Task);//Validando politica, metodo edit()
        if (!empty($Task)) {
            return view('tasks.edit', ['Task' => $Task]);
            //return redirect("/tasks/edit/{$id}");
            //return redirect("/tasks/edit/{$id}");
            //dd($Task);
        }
        return redirect('tasks');
    }

    public function destroy($id)
    {
        $Task = Task::find($id);
        $this->authorize('edit', $Task);//Validando politica, metodo edit()
        if (!empty($Task)) {
            $Task->delete();
            //dd($Task);
        }
        return redirect('tasks');
    }
}
