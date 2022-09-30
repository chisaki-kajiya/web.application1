@extends('layouts.default')

@section('error')
@if(count($errors)>0)
<ul>
  @foreach ($errors->all() as $error)
  <li>{{$error}}</li>
  @endforeach
</ul>
@endif
@endsection

@section('table')
@foreach($todos as $todo)
<tr>
  <td>{{$todo->created_at}}</td>
  <form action="/update/{{$todo->id}}" method="post">
    @csrf
    <td>
      <input type="text" value="{{$todo->name}}" class="input input-update" name="name">
    </td>
    <td>
      <select name="tag_id" class="select-tag"></select>
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
@endsection

@section('back-btn')
<a class="btn back-btn" href="/">戻る</a>