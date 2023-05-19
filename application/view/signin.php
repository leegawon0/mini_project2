<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MOMENT :: Sign Up</title>
	<link rel="shortcut icon" href="/application/view/img/favicon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="/application/view/css/common.css">
</head>
<body>
    <?php echo isset($this->signinFlg) ? "<script>window.location.href = '/user/login';</script>" : "" ?>
    
    <div class="wrapper">
        <div class="headerSection">
            <a class="headerLink" href="/user/main"><img class="headerImg" src="/application/view/img/header.png" alt=""></a>
        </div>
        <form class="form-signin" id="signinForm" action="/user/signin" method="post" onsubmit="return false">      
            <h2 class="form-signin-heading">회원가입</h2>
            <hr>
            <input type="text" class="form-control" name="id" id="id" value="<?php echo !empty($_POST) ? $_POST["id"] : "" ?>" placeholder="아이디" required=""/>
            <button class="btn chkBtn" type="button" onclick="chkDupId();">아이디 중복체크</button>
            <p id="errMsgId" class="errMsg"></p>
            <input type="password" class="form-control" name="pw" id="pw" placeholder="비밀번호" required=""/>
            <p class="errMsg"><?php echo isset($this->arrError["pw"]) ? $this->arrError["pw"] : "" ?></p>
            <input type="password" class="form-control" name="pwChk" id="pwChk" placeholder="비밀번호 확인" required=""/>
            <p class="errMsg"><?php echo isset($this->arrError["pwChk"]) ? $this->arrError["pwChk"] : "" ?></p>
            <input type="text" class="form-control" name="name" id="name" value="<?php echo !empty($_POST) ? $_POST["name"] : "" ?>" placeholder="이름" required=""/>
            <p class="errMsg"><?php echo isset($this->arrError["name"]) ? $this->arrError["name"] : "" ?></p>
            <div class="btnSection">
                <button class="btn mainBtn" id="submitBtn" type="submit" onclick="alert('아이디 중복체크를 먼저 진행해 주세요.')">회원가입</button>
            </div>
        </form>
    </div>

    <script src="/application/view/js/common.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>