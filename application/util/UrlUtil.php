<?php

namespace application\util;

class UrlUtil {

    // $_GET["url"]을 분석해서 리턴
    public static function getUrl() {
        return $path = isset($_GET["url"]) ? $_GET["url"] : "";
    }

    // URL을 "/"로 구분해서 배열을 만들고 리턴
    public static function getUrlArrPath() {
        $url = UrlUtil::getUrl();
        return $arr_path = $url !== "" ? explode("/", $url) : "";
    }

    // "/"를 "\"로 치환해주는 메소드
    public static function replaceSToBS($str) {
        return str_replace("/", "\\", $str);
    }
}

?>