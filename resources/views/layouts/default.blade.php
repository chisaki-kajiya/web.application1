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
  <div class="container"></div>
    <div class="card">
      <h1 class="top-title">Todo List</h1>
      @yield('error')
      <form action="add" method="post" class="flex between mb-30">
        @csrf
        <input type="text" class="input-add" name="name">
        <button class="btn btn-add">追加</button>
      </form>
      <table>
        <tr>
          <th>作成日</th>
          <th>タスク名</th>
          <th>更新</th>
          <th>削除</th>
        </tr>
        @yield('table')
      </table>
    </div>
  </div>
</body>

</html>