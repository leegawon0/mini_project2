<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List</title>
</head>
<body>
    <h1>List File</h1>
    <button id="logout" onclick="redirectLogout();">로그아웃</button>

    <script>
        function redirectLogout() {
            location.href = "/user/logout";
        }
    </script>
</body>
</html>