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
        <center>
            <h1>登录</h1>
                <form action="{{url('student/do_login')}}" method="post">
                    @csrf
                    <table>
                        <tr>

                            <td>用户名</td>
                            <td><input type="text" name="name"></td>
                        </tr>
                        <tr>
                            <td>密码</td>
                            <td><input type="password" name="password"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" name="" value="提交"></td>
                        </tr>
                    </table>
                </form>
        </center>
</body>
</html>