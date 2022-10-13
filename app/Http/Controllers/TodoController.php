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

    public function add(TodoRequest $request)
    {
        $form = $request->all();
        $form['user_id'] = Auth::id();
        Todo::create($form);
        return redirect('/');
    }

    public function delete(Request $request)
    {
        $todo = Todo::find($request->id)->delete();
        return redirect('/');
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
        $tags = Tag::all();
        $user = Auth::user();
        $todo = Todo::query();
        $tag_id = Todo::query();
        if(isset($todo)){
            $todo->where('name', 'LIKE', "%{$request->name}%");
        }
        if(isset($tag_id)){
            $todo->where('tag_id', "{$request->tag_id}");
        }
        unset($request['_token']);
        $todos = $todo->get();
        return view('find',['todos' => $todos, 'tags' => $tags, 'user' => $user]);
    }
}
