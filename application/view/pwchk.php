<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MOMENT :: Password Check</title>
	<link rel="shortcut icon" href="/application/view/img/favicon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="/application/view/css/common.css">
</head>
<body>
    <div class="wrapper">
        <div class="headerSection">
            <a class="headerLink" href="/user/main"><img class="headerImg" src="/application/view/img/header.png" alt=""></a>
        </div>
        <form class="form-signin" action="/user/pwchk" method="post">       
            <h2 class="form-signin-heading">비밀번호 확인</h2>
            <hr>
            <p class="errMsg"><?php echo isset($this->errMsg) ? $this->errMsg : ""; ?></p>
            <input type="password" class="form-control" name="chkPw" id="chkPw" placeholder="비밀번호를 한번 더 입력해 주세요." required=""/>      
            <div class="btnSection">
                <button class="btn mainBtn" type="submit">확인</button>
            </div>
        </form>
    </div>
    
    <script src="/application/view/js/common.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>