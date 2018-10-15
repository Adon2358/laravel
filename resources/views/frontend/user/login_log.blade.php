<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
  <table>
      <tr>
          <td>id</td>
          <td></td>
          <td>request_time</td>
          <td></td>
          <td>u_id</td>
      </tr>
      @foreach($data as $v)
          <tr>
              <td>{{$v->id}}</td>
              <td></td>
              <td><?php echo date('Y-m-d H:i:s',$v->request_time)?></td>
              <td></td>
              <td>{{$v->u_id}}</td>
          </tr>
      @endforeach
  </table>

</body>
</html>