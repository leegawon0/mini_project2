<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>비밀번호 확인</title>
    <link rel="stylesheet" href="/application/view/css/common.css">
</head>
<body>
    <h1>비밀번호 확인</h1>
    <h3 style="color: red;"><?php echo isset($this->errMsg) ? $this->errMsg : ""; ?></h3>
    <p>비밀번호를 한번 더 입력해 주세요.</p>
    <form action="/user/pwchk" method="post">
        <input type="password" name="chkPw" id="chkPw">
    </form>
    
    <script src="/application/view/js/common.js"></script>
</body>
</html>