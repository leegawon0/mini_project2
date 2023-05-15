<?php

namespace application\controller;

class UserController extends Controller {
    public function loginGet() {
        return "login"._EXTENSION_PHP;
    }

    public function loginPost() {
        $result = $this->model->getUser($_POST);
        // 유저 유무 체크
        if(count($result) === 0) {
            $errMsg = "입력하신 회원 정보가 없습니다.";
            $this->addDynamicProperty("errMsg", $errMsg);
            // 로그인 페이지 리턴
            return "login"._EXTENSION_PHP;
        }
        // session에 User ID 저장
        $_SESSION[_STR_LOGIN_ID] = $_POST["id"];
        // 리스트 페이지 리턴
        return _BASE_REDIRECT."/user/friend";
    }

    // 로그아웃 메소드
    public function logoutGet() {
        session_unset();
        session_destroy();
        // 로그인 페이지 리턴
        return _BASE_REDIRECT."/user/login";
    }

    public function signinGet() {
        return "signin"._EXTENSION_PHP;
    }

    public function signinPost() {
        var_dump($_POST);
        if(isset($_POST['chkFlg'])) {
            $result = $this->model->idDupChk($_POST);
            if($result !== 0) {
                $errMsg = "이미 존재하는 id입니다.";
                $this->addDynamicProperty("errMsg", $errMsg);
                return "signin"._EXTENSION_PHP;
            }
            $errMsg = "사용할 수 있는 id입니다.";
            $this->addDynamicProperty("errMsg", $errMsg);
            return "signin"._EXTENSION_PHP;
        } else {
            var_dump($_POST);
            $result = $this->model->insertUser($_POST);
            if($result !== 1) {
                $errMsg = "회원가입에 실패했습니다.";
                $this->addDynamicProperty("errMsg", $errMsg);
                // 회원가입 페이지 리턴
                return "signin"._EXTENSION_PHP;
            }
            return _BASE_REDIRECT."/user/login";
        }
    }

    public function friendGet() {
        if(empty($_SESSION)) {
            return "login"._EXTENSION_PHP;
        } else {
            return "friend"._EXTENSION_PHP;
        }
    }

    public function settingGet() {
        if(empty($_SESSION)) {
            return "login"._EXTENSION_PHP;
        } else {
            return "setting"._EXTENSION_PHP;
        }
    }

    public function signoutGet() {
        $result = $this->model->deleteUser($_SESSION);
        if($result !== 1) {
            $errMsg = "회원 탈퇴에 실패했습니다.";
            $this->addDynamicProperty("errMsg", $errMsg);
            // 설정 페이지 리턴
            return "setting"._EXTENSION_PHP;
        }
        return _BASE_REDIRECT."/user/login";
    }
}

?>