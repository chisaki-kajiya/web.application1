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
  <td class="input-update">{{$todo->name}}</td>
  <td class="btn btn-update">更新</td>
  <td>
    <form action="/todo/delete/{{$todo->id}}" method="post">
    @csrf
      <button class="btn btn-delete">削除</button>
    </form>
  </td>
</tr>
@endforeach
@endsection