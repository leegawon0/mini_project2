<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
</head>
<body>
    <h1>회원가입</h1>
    <h3 style="color: red;"><?php echo isset($this->errMsg) ? $this->errMsg : ""; ?></h3>
    <form action="/user/signin" method="post">
        <label for="id">ID</label>
        <input type="text" name="id" id="id" required value=<?php echo isset($_POST['id']) ? $_POST['id'] : "" ?>>
        <input type="hidden" name="chkFlg" value="1">
        <button type="submit">ID 중복체크</button>
    </form>
    <form action="/user/signin" method="post">
        <input type="hidden" name="chkId" value=<?php echo isset($_POST['id']) ? $_POST['id'] : "" ?>>
        <label for="pw">PW</label>
        <input type="password" name="pw" id="pw" required>
        <br><br>
        <button type="submit">회원가입</button>
    </form>
</body>
</html>