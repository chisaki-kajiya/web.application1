<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Todo;
use App\Models\Tag;
use App\Http\Requests\TodoRequest;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        $tags = Tag::all();
        $user = Auth::user();
        return view('index',['todos' => $todos, 'tags' => $tags, 'user' => $user]);
    }

    public function add()
    {
        $todos = Todo::all();
        return view('index',['todos' => $todos]);
    }

    public function create(TodoRequest $request)
    {
        $form = $request->all();
        Todo::create($form);
        return redirect('/');
    }

    public function delete(Request $request)
    {
        $todo = Todo::find($request->id);
        return view('index', ['form' => $todo]);
    }

    public function remove(Request $request)
    {
        Todo::find($request->id)->delete();
        return redirect('/');
    }

    public function edit(Request $request)
    {
        $todo = Todo::find($request->id);
        return view('index', ['form' => $todo]);
    }

    public function update(TodoRequest $request)
    {
        $form = $request->all();
        unset($form['_token']);
        Todo::where('id', $request->id)->update($form);
        return redirect('/');
    }

    public function find()
    {
        $todos = NULL;
        $tags = Tag::all();
        $user = Auth::user();
        return view('find',['todos' => $todos, 'tags' => $tags, 'user' => $user]);
    }

    public function search(Request $request)
    {
        $todos = Todo::all();
        if(isset($name)){
            $todos = Todo::where('name', 'LIKE', "%{$request->name}%")->get();
        }
        $tags = Tag::all();
        $user = Auth::user();
        unset($request['_token']);
        return view('find',['todos' => $todos, 'tags' => $tags, 'user' => $user]);
    }
}
