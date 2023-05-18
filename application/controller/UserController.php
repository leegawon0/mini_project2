<?php

namespace application\controller;

class UserController extends Controller {
    public function loginGet() {
        return "login"._EXTENSION_PHP;
    }

    public function loginPost() {
        $result = $this->model->getUser($_POST);
        $this->model->close(); // DB 파기
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
        return _BASE_REDIRECT."/user/main";
    }

    // 로그아웃 메소드
    public function logoutGet() {
        session_unset();
        session_destroy();
        // 로그인 페이지 리턴
        return _BASE_REDIRECT."/user/login";
    }

    // 회원가입
    public function signinGet() {
        return "signin"._EXTENSION_PHP;
    }

    public function signinPost() {

        $arrPost = $_POST;
        $arrChkErr = [];
        // 유효성체크

        // ID 영문숫자 체크
        $chk1 = preg_match('/^[0-9a-z]*$/u', $arrPost["id"]);
        if($chk1 !== 1) {
            $arrChkErr["id"] = "* ID는 영문 소문자, 숫자 조합으로 입력해 주세요.";
        }

        // ID 글자수 체크
        if(mb_strlen($arrPost["id"]) === 0 || mb_strlen($arrPost["id"]) > 12) {
            $arrChkErr["id"] = "* ID는 12글자 이하로 입력해 주세요.";
        }

        // PW 글자수 체크
        if(mb_strlen($arrPost["pw"]) > 20 || mb_strlen($arrPost["pw"]) < 8) {
            $arrChkErr["pw"] = "* 비밀번호는 8~20글자로 입력해 주세요.";
        }
        // PW 영문숫자특문 체크 (추가하기)
        $chk2 = preg_match('/^[0-9a-zA-Z\!\@\#\$\%\^\&\*]*$/u', $arrPost["pw"]);
        if($chk2 !== 1) {
            $arrChkErr["pw"] = "* 비밀번호는 영문, 숫자, 특수문자 조합으로 입력해 주세요.";
        }

        // 비밀번호와 비밀번호 확인
        if($arrPost["pw"] !== $arrPost["pwChk"]) {
            $arrChkErr["pwChk"] = "* 비밀번호 확인이 일치하지 않습니다.";
        }

        // name 글자수 체크
        if(mb_strlen($arrPost["name"]) > 30 || mb_strlen($arrPost["name"]) < 2) {
            $arrChkErr["name"] = "* 이름은 2~30글자로 입력해 주세요.";
        }

        // 유효성체크 에러가 발생할 경우
        if(!empty($arrChkErr)) {
            // 에러메세지 셋팅
            $this->addDynamicProperty('arrError', $arrChkErr);
            return "signin"._EXTENSION_PHP;
        }

        // *** Transaction Start
        $this->model->beginTransaction();

        // user insert
        if(!$this->model->insertUser($arrPost)) {
            // 예외처리 롤백
            $this->model->rollback();
            echo "User Regist Error";
            exit();
        }
        $this->model->commit(); // 정상처리 커밋
        // *** Transaction End

        // 로그인페이지로 이동
        return _BASE_REDIRECT."/user/login";

    }

    public function mainGet() {
        return "main"._EXTENSION_PHP;
    }

    public function settingGet() {
        $arrSession = ["id" => $_SESSION['u_id']];
        $result = $this->model->getUser($arrSession, false, true);
        $this->addDynamicProperty("arrUserInfo", $result[0]);
        return "setting"._EXTENSION_PHP;
    }

    public function settingPost() {

        $arrPost = $_POST;
        $arrChkErr = [];
        // 유효성체크

        if(mb_strlen($arrPost["pw"]) === 0 && mb_strlen($arrPost["pwChk"]) === 0) {
            $updateUserFlg = false;
        } else {
            $updateUserFlg = true;

            // PW 글자수 체크
            if(mb_strlen($arrPost["pw"]) > 20 || mb_strlen($arrPost["pw"]) < 8) {
                $arrChkErr["pw"] = "* 비밀번호는 8~20글자로 입력해 주세요.";
            }
            // PW 영문숫자특문 체크 (추가하기)
            $chk2 = preg_match('/^[0-9a-zA-Z\!\@\#\$\%\^\&\*]*$/u', $arrPost["pw"]);
            if($chk2 !== 1) {
                $arrChkErr["pw"] = "* 비밀번호는 영문, 숫자, 특수문자 조합으로 입력해 주세요.";
            }

            // 비밀번호와 비밀번호 확인
            if($arrPost["pw"] !== $arrPost["pwChk"]) {
                $arrChkErr["pwChk"] = "* 비밀번호 확인이 일치하지 않습니다.";
            }
        }

        // name 글자수 체크
        if(mb_strlen($arrPost["name"]) > 30 || mb_strlen($arrPost["name"]) < 2) {
            $arrChkErr["name"] = "* 이름은 2~30글자로 입력해 주세요.";
        }

        // 유효성체크 에러가 발생할 경우
        if(!empty($arrChkErr)) {
            // 에러메세지 셋팅
            $this->addDynamicProperty('arrError', $arrChkErr);
            return "setting"._EXTENSION_PHP;
        }

        // *** Transaction Start
        $this->model->beginTransaction();

        // user insert
        if(!$this->model->updateUser($arrPost, $updateUserFlg)) {
            // 예외처리 롤백
            $this->model->rollback();
            echo "User Regist Error";
            exit();
        }
        $this->model->commit(); // 정상처리 커밋
        // *** Transaction End

        echo "<script>alert('정보 수정이 완료되었습니다');</script>";
        $this->addDynamicProperty('successFlg', true);

        // 메인 페이지로 이동
        return "setting"._EXTENSION_PHP;
        // return _BASE_REDIRECT."/user/main";

    }

    public function signoutGet() {
        // *** Transaction Start
        $this->model->beginTransaction();

        // user insert
        if(!$this->model->deleteUser($_SESSION)) {
            // 예외처리 롤백
            $this->model->rollback();
            echo "User Signout Error";
            exit();
        }
        $this->model->commit(); // 정상처리 커밋
        // *** Transaction End
        return _BASE_REDIRECT."/user/login";
    }

    public function pwchkGet() {
        return "pwchk"._EXTENSION_PHP;
    }

    public function pwchkPost() {
        $arrPrepare["id"] = $_SESSION[_STR_LOGIN_ID]; 
        $result = $this->model->getUser($arrPrepare, false, false);
        $this->model->close(); // DB 파기

        // 유저 유무 체크
        if($_POST["chkPw"] !== $result[0]["u_pw"]) {
            $errMsg = "비밀번호를 잘못 입력하셨습니다.";
            $this->addDynamicProperty("errMsg", $errMsg);
            // 로그인 페이지 리턴
            return "pwchk"._EXTENSION_PHP;
        }
        // session에 chk_flg 저장
        $_SESSION["chk_flg"] = "1";
        // 설정 페이지 리턴
        return _BASE_REDIRECT."/user/setting";
    }
}

?>