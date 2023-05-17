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
            idspan.innerHTML = "* 입력하신 ID가 존재하지 않습니다.";
        }
    })
    // 에러는 alert로 처리
    .catch(error => alert(error.message));
}

function signoutConfirm() {
    if(confirm('정말 탈퇴하시겠습니까?')) {
        redirectSignout();
    } else {
        redirectSetting();
    }
}

function editFormSubmit() {
    document.getElementById('editForm').submit();
}