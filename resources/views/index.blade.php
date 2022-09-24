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
  <td>
    <form action="{{ route('update', ['id' => 1]) }}" method="post">
    @csrf
      <input type="text" value="{{$todo->name}}" class="input input-update">
    </form>
  </td>
  <td>
    <form action="/update/{{$todo -> id}}" method="get">
    @csrf
      <button class="btn btn-update">更新</button>
    </form>
  </td>
  <td>
    <form action="/delete/{{$todo->id}}" method="post">
    @csrf
      <button class="btn btn-delete">削除</button>
    </form>
  </td>
</tr>
@endforeach
@endsection