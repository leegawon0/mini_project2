<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/application/view/css/common.css">
</head>
<body>
    <div class="loginContainer">
        <div class="loginHeader">
            <h1>Login</h1>
        </div>
        <div class="loginWrap">
            <h3 style="color: red;"><?php echo isset($this->errMsg) ? $this->errMsg : ""; ?></h3>
            <form action="/user/login" method="post">
                <input type="text" name="id" id="id" >
                <input type="password" name="pw" id="pw">
                <button type="submit">로그인</button>
            </form>
        </div>
        <div class="signinWrap">
            <button id="signin" onclick="redirectSignin();">회원가입</button>
        </div>
    </div>

    <script src="/application/view/js/common.js"></script>
</body>
</html>