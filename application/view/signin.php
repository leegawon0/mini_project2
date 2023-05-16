<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="/application/view/css/common.css">
</head>
<body>
    <h1>회원가입</h1>
    <form id="signinForm" action="/user/signin" method="post" onsubmit="return false">
        <span id="errMsgId" class="errMsg"></span>
        <br>
        <label for="id">아이디</label>
        <input type="text" name="id" id="id" value="<?php echo !empty($_POST) ? $_POST["id"] : "" ?>">
        <button type="button" onclick="chkDupId();">아이디 중복체크</button>
        <span class="errMsg"><?php echo isset($this->arrError["id"]) ? $this->arrError["id"] : "" ?></span>
        <br><br>
        <label for="pw">비밀번호</label>
        <input type="password" name="pw" id="pw">
        <span class="errMsg"><?php echo isset($this->arrError["pw"]) ? $this->arrError["pw"] : "" ?></span>
        <br><br>
        <label for="pwChk">비밀번호 확인</label>
        <input type="password" name="pwChk" id="pwChk">
        <span class="errMsg"><?php echo isset($this->arrError["pwChk"]) ? $this->arrError["pwChk"] : "" ?></span>
        <br><br>
        <label for="name">이름</label>
        <input type="text" name="name" id="name" value="<?php echo !empty($_POST) ? $_POST["name"] : "" ?>">
        <span class="errMsg"><?php echo isset($this->arrError["name"]) ? $this->arrError["name"] : "" ?></span>
        <br><br>
        <button type="button" onclick="document.getElementById('signinForm').submit();">회원가입</button>
    </form>

    <script src="/application/view/js/common.js"></script>
</body>
</html>