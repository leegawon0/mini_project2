<?php

// xcopy D:\workspace\mini_project2 C:\Apache24\htdocs /e /h /k /y /exclude:test.txt
// 로그인(O) + 회원가입(O) + 회원정보 수정(O) + 탈퇴(O) + 메인페이지(X) 구현

// config 파일 불러오기
require_once("application/lib/config.php");

// autoload 파일 불러오기
require_once("application/lib/autoload.php");

// Application 클래스 호출
new application\lib\Application();

?>