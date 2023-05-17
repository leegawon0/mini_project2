<?php

namespace application\controller;
use application\util\UrlUtil;
use \AllowDynamicProperties; // 기존에 추가해두지 않았지만 나중에 사용하게 되는 속성인 동적속성들을 사용할 수 있게 해줌

#[AllowDynamicProperties] // 기존에 추가해두지 않았지만 나중에 사용하게 되는 속성인 동적속성들을 사용할 수 있게 해줌
class Controller {
    protected $model;
    private static $modelList = [];
    private static $arrNeedAuth = ["user/main", "user/setting"];

    // 생성자
    public function __construct($identityName, $action) { 
        // session start
        if(!isset($_SESSION)) {
            session_start();
        }

        // 유저 로그인 및 권한 체크
        $this->chkAuth();

        // model 호출
        $this->model = $this->getModel($identityName);

        // 해당 controller의 메소드 호출
        $view = $this->$action();

        if(empty($view)) {
            echo "해당 Controller에 메소드가 없습니다. : ".$action;
            exit();
        }

        // view 호출
        require_once $this->getView($view);
    }

    // model 호출하고 결과를 return
    protected function getModel($identityName) { 
        // model 생성 체크
        if(!in_array($identityName, self::$modelList)) {
            $modelName = UrlUtil::replaceSToBS(_PATH_MODEL.$identityName._BASE_FILENAME_MODEL);
            self::$modelList[$identityName] = new $modelName();
        }
        return self::$modelList[$identityName];
    }

    // 파라미터를 확인해서 해당하는 view를 리턴하거나, redirect
    protected function getView($view) { 
        // view를 체크
        if(strpos($view, _BASE_REDIRECT) === 0) {
            header($view);
            exit();
        }

        return _PATH_VIEW.$view;
    }

    // 동적 속성(Dynamic Property)를 셋팅하는 메소드
    protected function addDynamicProperty($key, $val) {
        $this->$key = $val;
    }

    // 유저 권한 체크 메소드
    protected function chkAuth() {
        $urlPath = UrlUtil::getUrl();
        foreach(self::$arrNeedAuth as $authPath) {
            if(!isset($_SESSION[_STR_LOGIN_ID]) && strpos($urlPath, $authPath) === 0) {
                header(_BASE_REDIRECT."/user/login");
                exit;
            }
        }
    }
}

?>