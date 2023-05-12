<?php

spl_autoload_register( function($path) {

    // "\"를 "/"로 변환
    $path = str_replace("\\", "/", $path);

    // 해당 파일 require
    require_once($path._EXTENSION_PHP);
});

?>