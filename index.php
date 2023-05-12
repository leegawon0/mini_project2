<?php

// xcopy D:\workspace\mini_project2 C:\Apache24\htdocs /e /h /k /y /exclude:test.txt

// config 파일 불러오기
require_once("application/lib/config.php");

// autoload 파일 불러오기
require_once("application/lib/autoload.php");

// Application 클래스 호출
new application\lib\Application();

?>