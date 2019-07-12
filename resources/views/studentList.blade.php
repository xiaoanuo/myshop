<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>student</title>
</head>
<body>
    <center>
        <h1>学生列表</h1>
            <form action="{{url('student/index')}}" method="get">
                姓名：<input type="text" name="search" value="{{$search}}">
                <input type="submit" name="" value="查询">
            </form>
        <table border="1">
            <tr>
                <td>id</td>
                <td>姓名</td>
                <td>年龄</td>
                <td>电话</td>
                <td>性别</td>
                <td>操作</td>
            </tr>
            @foreach($student as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->age }}</td>
                    <td>{{ $item->tel }}</td>
                    <td>{{ $item->sex}}</td>
                    <td>
                        <a href="{{url('student/update')}}?id={{ $item->id }}">修改</a>
                        <a href="{{url('student/delete')}}?id={{ $item->id }}">删除</a>
                    </td>
                </tr>
            @endforeach
        </table>
        {{ $student->appends(['search'=>$search])->links() }}
    </center>


</body>
</html>