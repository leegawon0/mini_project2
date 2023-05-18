function redirectSignin() {
    location.href = "/user/signin"
}

function redirectLogout() {
    location.href = "/user/logout";
}

function redirectSetting() {
    location.href = "/user/setting";
}

function redirectSignout() {
    location.href = "/user/signout";
}

function chkDupId() {
    const id = document.getElementById('id');
    const url = "/api/user?id=" + id.value;
    const submitBtn = document.getElementById('submitBtn');
    const signinForm = document.getElementById('signinForm');
    let apiData = null;

    // API
    fetch(url)
    .then(res => {
        if(res.status !== 200) {
            throw new Error(res.status + ' : API Response Error' );
        }
        return res.json();})
    .then(apiData => {
        const idspan = document.getElementById('errMsgId');
        if(apiData["flg"] === "1") {
            idspan.innerHTML = apiData["msg"];
        } else {
            const regEx = new RegExp('^[a-z0-9]{3,12}$');
            if(regEx.test(id.value)) {
                idspan.innerHTML = "* 사용 가능한 ID입니다.";
                id.setAttribute('readonly', true)
                submitBtn.removeAttribute('onclick');
                signinForm.removeAttribute('onsubmit');
            } else {
                idspan.innerHTML = "* ID는 3~12글자의 영문 소문자, 숫자 조합이어야 합니다.";
            }
        }
    })
    // 에러는 alert로 처리
    .catch(error => alert(error.message));
}

function signoutConfirm() {
    if(confirm('정말 탈퇴하시겠습니까?')) {
        alert('회원 탈퇴가 완료되었습니다.');
        redirectSignout();
    } else {
        return false;
    }
}

function editFormSubmit() {
    document.getElementById('editForm').submit();
}