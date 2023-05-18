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
        return false;
    }
}

function editFormSubmit() {
    document.getElementById('editForm').submit();
}

// function CustomAlert(){
//     this.alert = function(message,title){
//       document.body.innerHTML = document.body.innerHTML + '<div id="dialogoverlay"></div><div id="dialogbox" class="slit-in-vertical"><div><div id="dialogboxhead"></div><div id="dialogboxbody"></div><div id="dialogboxfoot"></div></div></div>';

//       let dialogoverlay = document.getElementById('dialogoverlay');
//       let dialogbox = document.getElementById('dialogbox');

//       let winH = window.innerHeight;
//       dialogoverlay.style.height = winH+"px";

//       dialogbox.style.top = "100px";

//       dialogoverlay.style.display = "block";
//       dialogbox.style.display = "block";

//       document.getElementById('dialogboxhead').style.display = 'block';

//       if(typeof title === 'undefined') {
//         document.getElementById('dialogboxhead').style.display = 'none';
//       } else {
//         document.getElementById('dialogboxhead').innerHTML = '<i class="fa fa-exclamation-circle" aria-hidden="true"></i> '+ title;
//       }
//       document.getElementById('dialogboxbody').innerHTML = message;
//       document.getElementById('dialogboxfoot').innerHTML = '<button class="pure-material-button-contained active" onclick="customAlert.ok()">OK</button>';
//     }
    
//     this.ok = function(){
//       document.getElementById('dialogbox').style.display = "none";
//       document.getElementById('dialogoverlay').style.display = "none";
//     }
//   }

//   let customAlert = new CustomAlert();