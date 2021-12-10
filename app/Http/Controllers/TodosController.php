<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TodosController extends Controller
{
    //

    public function index(Request $request)
    {
        # code...

        $todos = Todo::all();
        return view('todos.index')->with(['todos' => $todos]);
    }

    public function byUserId(Request $request)
    {
        # code...

        $todos = Todo::where('user_id', Auth::user()->id)->get();
        return view('todos.index')->with(['todos' => $todos]);
    }

    public function show(Request $request, $id)
    {
        # code...
        $todo = Todo::find($id);
        return view('todos.show')->with(['todo' => $todo]);
    }

    public function edit(Request $request, $id)
    {
        # code...
        $todo = Todo::find($id);
        return view('todos.edit', ['todo' => $todo]);
    }

    public function update(Request $request, $id)
    {
        # Validations before updating
        $todo = Todo::where('user_id', Auth::user()->id)->where('id', $id)->first();

        if ($todo) {
            $todo->title = $request->title;
            $todo->desc = $request->desc;
            $todo->status = $request->status == 'on' ? 1 : 0;
            if ($todo->save()) {
                return redirect()->route('dashboard');
            }
            return; // 422
        }

        return; // 401
    }

    public function create(Request $request)
    {
        # code...
        return view('todos.add');
    }

    public function store(Request $request)
    {
        # Validations before updating
        $todo = new Todo;
        $todo->title = $request->title;
        $todo->desc = $request->desc;
        $todo->user_id = Auth::user()->id;
        if ($todo->save()) {
            return redirect()->route('dashboard');
        }

        return; // 422
    }

    public function delete(Request $request, $id)
    {
        # code...
        $todo = Todo::where('user_id', Auth::user()->id)->where('id', $id)->first();
        if ($todo) {
            $todo->delete();
            return view('todos.index');
        }
        return; // 404
    }
}
