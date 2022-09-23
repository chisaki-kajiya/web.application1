<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use App\Http\Requests\TodoRequest;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        return view('index',['todos' => $todos]);
    }

    public function add(Request $request)
    {
        $todos = Todo::all();
        return view('add',['todos' => $todos]);
    }

    public function create(TodoRequest $request)
    {
        $form = $request->allRequest();
        Todo::create($form);
        return redirect('/');
    }

    public function delete(Request $request)
    {
        $todo = Todo::find($request->id);
        return view('delete', ['form' => $todo]);
    }

    public function remove(Request $request)
    {
        Todo::find($request->id)->delete();
        return redirect('/');
    }
}
