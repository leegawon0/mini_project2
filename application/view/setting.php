<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Setting</title>
</head>
<body>
    <?php var_dump($_SESSION) ?>
    <h1>설정 페이지 입니다.</h1>
    <h3 style="color: red;"><?php echo isset($this->errMsg) ? $this->errMsg : ""; ?></h3>
    <button id="signout" onclick="alert('정말 탈퇴하시겠습니까?'); redirectSignout();">회원 탈퇴</button>
    <script src="/application/view/js/common.js"></script>
</body>
</html>