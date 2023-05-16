<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main</title>
    <link rel="stylesheet" href="/application/view/css/common.css">
</head>
<body>
    <h3>로그인 정보 : <?php echo $_SESSION[_STR_LOGIN_ID] ?></h3>
    <h1>메인 페이지 입니다.</h1>
    <button id="logout" onclick="redirectLogout();">로그아웃</button>
    <button id="setting" onclick="redirectSetting();">설정</button>
    <script src="/application/view/js/common.js"></script>
</body>
</html>