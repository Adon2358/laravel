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
    @foreach($data as $v)
        <p>{{$v->id}}</p>
        <p><?php echo date('Y-m-d H:i:s',$v->request_time) ?></p>
        <p>{{$v->u_id}}</p>
    @endforeach
</body>
</html>