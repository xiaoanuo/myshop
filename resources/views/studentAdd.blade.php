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
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    @endif
    <form method="post" action="{{url('student/do_add')}}">
        @csrf
            <table border="1">
                <tr>
                    <td>姓名：</td>
                    <td><input type="text" name="name"></td>
                </tr>
                <tr>
                    <td>年龄：</td>
                    <td><input type="text" name="age"></td>
                </tr>
                <tr>
                    <td>电话：</td>
                    <td><input type="text" name="tel"></td>
                </tr>
                <tr>
                    <td>性别：</td>
                    <td><input type="text" name="sex"></td>
                </tr>
                <tr>
                    <td>O(∩_∩)O</td>
                    <td><input type="submit" value="提交"></td>
                </tr>
            </table>
    </form>
</body>
</html>