<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('/assets/css/reset.css') }}">
  <link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">
  <title>COACHTECH</title>

</head>

<body>
  <div class="container">
    <div class="card">
      <div class="card__header">
        <h1 class="title mb-15">Todo List</h1>
        <div class="auth mb-15">
          <p class="detail">「{{$user->name}}」でログイン中
          </p>
          <form action="/logout" method="post">
            @csrf
            <input type="submit" class="btn btn-logout" value="ログアウト">
          </form>
        </div>
      </div>
      <a class="btn btn-search" href="/find">タスク検索</a>
      @if(count($errors)>0)
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
      </ul>
      @endif
      <form action="add" method="post" class="flex between mb-30">
        @csrf
        <input type="text" class="input-add" name="name">
        <select name="tag_id" class="select-tag">
          @foreach($tags as $tag)
            <option value="{{ $tag->id }}">{{$tag->name}}</option>
          @endforeach
        </select>
        <button class="btn btn-add">追加</button>
      </form>
      <table>
        <tr>
          <th>作成日</th>
          <th>タスク名</th>
          <th>タグ</th>
          <th>更新</th>
          <th>削除</th>
        </tr>
        @yield('table')
      </table>
      @yield('back-btn')
    </div>
  </div>
</body>

</html>