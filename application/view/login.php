<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MOMENT :: Login</title>
	<link rel="shortcut icon" href="/application/view/img/favicon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="/application/view/css/common.css">
</head>
<body>
    <div class="wrapper">
        <div class="headerSection">
            <a class="headerLink" href="/user/main"><img class="headerImg" src="/application/view/img/header.png" alt=""></a>
        </div>
        <form class="form-signin" action="/user/login" method="post">       
            <h2 class="form-signin-heading">로그인</h2>
            <hr>
            <p class="errMsg"><?php echo isset($this->errMsg) ? $this->errMsg : ""; ?></p>
            <input type="text" class="form-control" name="id" id="id" placeholder="아이디" required="" autofocus="" />
            <input type="password" class="form-control" name="pw" id="pw" placeholder="비밀번호" required=""/>
            <div class="btnSection">
                <button class="btn mainBtn" type="submit">로그인</button>
            </div>
            <div class="btnSection2">
                <span class="signinMsg">아직 계정이 없으신가요?</span>
                <button class="signinBtn" id="signin" onclick="redirectSignin();">회원가입</button>
            </div>
        </form>
    </div>

    <script src="/application/view/js/common.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>