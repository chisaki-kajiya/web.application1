@extends('layouts.default')

@section('title')
タスク検索
@endsection

@section('todo-action')
  @if(count($errors)>0)
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
      @endforeach
    </ul>
  @endif

  <form action="/search" method="get" class="flex between mb-30">
    @csrf
    <input type="text" class="input-add" name="name">
    <select name="tag_id" class="select-tag">
        <option value=""></option>
      @foreach($tags as $tag)
        <option value="{{ $tag->id }}">{{$tag->name}}</option>
      @endforeach
    </select>
    <button class="btn btn-add">検索</button>
  </form>
@endsection

@section('table')
@if (isset($todos))
@foreach($todos as $todo)
<tr>
  <td>{{$todo->created_at}}</td>
  <form action="/update/{{$todo->id}}" method="post">
    @csrf
    <td>
      <input type="text" value="{{$todo->name}}" class="input input-update" name="name">
    </td>
    <td>
      <select name="tag_id" class="select-tag" value="{{$todo->tag_id}}" name="tag_id">
        @foreach($tags as $tag)
          <option value="{{ $tag->id }}"
          @if( ($todo->tag)->id == $tag->id) selected @endif>
            {{$tag->name}}
          </option>
        @endforeach
      </select>
    </td>
    <td>
      <button class="btn btn-update">更新</button>
    </td>
  </form>
  <td>
    <form action="/delete/{{$todo->id}}" method="post">
    @csrf
      <button class="btn btn-delete">削除</button>
    </form>
  </td>
</tr>
@endforeach
@endif
@endsection

@section('card-footer')
<a class="btn btn-back" href="/">戻る</a>
@endsection