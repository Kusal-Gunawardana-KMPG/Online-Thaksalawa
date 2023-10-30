function changeView() {
    var signUpBox = document.getElementById("signUpBox");
    var signInBox = document.getElementById("signInBox");

    signUpBox.classList.toggle("d-none");
    signInBox.classList.toggle("d-none");
}

var av;

function adminVerification() {
    var email = document.getElementById("adminemail");

    var f = new FormData();
    f.append("adminemail", email.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                var adminVerificationModal = document.getElementById("verificationModal");
                av = new bootstrap.Modal(adminVerificationModal);
                av.show();
            } else {
                alert(t);
            }
        }
    }

    r.open("POST", "adminVerificationProcess.php", true);
    r.send(f);
}


function verify() {
    var verification = document.getElementById("adminvcode");


    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                av.hide();
                window.location = "adminPanel.php";
            } else {
                alert(t);
            }

        }
    }

    r.open("GET", "verificationProcess.php?v=" + verification.value, true);
    r.send();
}

function adminsignin() {
    window.location = "adminsignin.php";
}

function studentlogin() {
    window.location = "index.php";
}


var sUp;


function signUp() {

    var verification = document.getElementById("studentvcode");
    var f = document.getElementById("fname");
    var l = document.getElementById("lname");
    var e = document.getElementById("e");
    var p = document.getElementById("p");
    var m = document.getElementById("mobile");
    var g = document.getElementById("gender");
    var grd = document.getElementById("grade");

    var form = new FormData();

    form.append("verification", verification.value);
    form.append("f", f.value);
    form.append("l", l.value);
    form.append("e", e.value);
    form.append("p", p.value);
    form.append("m", m.value);
    form.append("g", g.value);
    form.append("grd", grd.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;

            if (text == "You Will Receive a Verification Code From Academic Officer. Checkout Your Email Now") {

                document.getElementById("msg").innerHTML = text;
                document.getElementById("msg").className = "bi bi-check2-circle fs-5";
                document.getElementById("alertdiv").className = "alert alert-success";
                document.getElementById("msgdiv").className = "d-block";

                setTimeout(openStudentVerificationModal, 3000);

                function openStudentVerificationModal() {
                    var studentVerificationModal = document.getElementById("studentverificationModal");
                    sUp = new bootstrap.Modal(studentVerificationModal);
                    sUp.show();
                }
            } else {
                document.getElementById("msg").innerHTML = text;
                document.getElementById("msgdiv").className = "d-block";
            }


        }
    }

    r.open("POST", "signUpProcess.php", true);
    r.send(form);

}

function studentverify() {

    var verification = document.getElementById("studentvcode");
    var f = document.getElementById("fname");
    var l = document.getElementById("lname");
    var e = document.getElementById("e");
    var p = document.getElementById("p");
    var m = document.getElementById("mobile");
    var g = document.getElementById("gender");
    var grd = document.getElementById("grade");

    var form = new FormData();

    form.append("verification", verification.value);
    form.append("f", f.value);
    form.append("l", l.value);
    form.append("e", e.value);
    form.append("p", p.value);
    form.append("m", m.value);
    form.append("g", g.value);
    form.append("grd", grd.value);


    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;

            if (text == "Successfully Verified") {
                alert(text);
                sUp.hide();
                alert("If You Have Successfully Verified Your Account Now You Can Sign In. Else Try Again....!!!");
                window.location = "home.php";

            } else {
                alert(text);
                sUp.hide();
                alert("If You Have Successfully Verified Your Account Now You Can Sign In. Else Try Again....!!!");
            }

        }
    }

    r.open("POST", "studentverificationProcess.php", true);
    r.send(form);
}


function signin() {

    var email = document.getElementById("signinemail");
    var password = document.getElementById("signinpassword");

    var f = new FormData();
    f.append("e", email.value);
    f.append("p", password.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                window.location = "home.php";
            } else {
                alert(t);
            }
        }
    }

    r.open("POST", "signInProcess.php", true);
    r.send(f);

}


function signout() {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                window.location = "index.php";
            } else {
                alert("Try Again......")
            }
        }
    };

    r.open("GET", "signoutProcess.php", true);
    r.send();

}



function index() {
    window.location = "index.php";
}

function academic() {
    window.location = "academicsignin.php";
}

function teacher() {
    window.location = "teachersignin.php";
}


function teacherchangeView() {
    var signUpBox = document.getElementById("teachersigninBox");
    var signInBox = document.getElementById("teachersignupBox");

    signUpBox.classList.toggle("d-none");
    signInBox.classList.toggle("d-none");
}


var teacherModal;

function teachersignup() {

    var teachersignupemail = document.getElementById("teachersignupemail");

    var teacherusername = create_username(5);
    var teacherpassword = create_password(8);

    function create_username(string_length) {
        var username = '';
        var characters = 'QWERTYUIOPLKJHGFDSAZXCVBNMqwertyuioplkjhgfdsazxcvbnm0123456789'
        for (var i, i = 0; i < string_length; i++) {
            username += characters.charAt(Math.floor(Math.random() * characters.length))

        }
        return username
    }


    function create_password(string_length) {
        var username = '';
        var characters = 'qwertyuioplkjhgfdsazxcvbnm0123456789'
        for (var i, i = 0; i < string_length; i++) {
            username += characters.charAt(Math.floor(Math.random() * characters.length))

        }
        return username
    }


    var f = new FormData();
    f.append("teachersignupemail", teachersignupemail.value);
    f.append("teacherusername", teacherusername);
    f.append("teacherpassword", teacherpassword);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                alert("Verification Details has Send to Your Email");
                var teacherverificationModal = document.getElementById("teacherverificationModal");
                teacherModal = new bootstrap.Modal(teacherverificationModal);
                teacherModal.show();
            } else {
                alert(t);
            }
        }
    }

    r.open("POST", "teachersignupProcess.php", true);
    r.send(f);

}


function verifyteacher() {

    var verificationusername = document.getElementById("teachersusername");
    var verificationpassword = document.getElementById("teacherspassword");
    var verificationcode = document.getElementById("teachersvcode");

    var f = new FormData();
    f.append("verificationusername", verificationusername.value);
    f.append("verificationpassword", verificationpassword.value);
    f.append("verificationcode", verificationcode.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                teacherModal.hide();
                alert("Verification Completed");
                window.location = "teacherpanel.php"
            } else {
                alert(t);
            }
        }
    }


    r.open("POST", "teacherverificationProcess.php", true);
    r.send(f);
}


function teachersignin() {

    var teachersigninemail = document.getElementById("teachersigninemail");
    var teachersigninpassword = document.getElementById("teachersigninpassword");

    var f = new FormData();
    f.append("teachersigninemail", teachersigninemail.value);
    f.append("teachersigninpassword", teachersigninpassword.value);


    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                window.location = "teacherpanel.php";

            } else {
                alert(t);
            }
        }
    }


    r.open("POST", "teachersigninprocess.php", true);
    r.send(f);
}


function academicsOfficersignin() {

    var academicsigninemail = document.getElementById("academicsigninemail");
    var academicsigninpassword = document.getElementById("academicsigninpassword");

    var f = new FormData();
    f.append("academicsigninemail", academicsigninemail.value);
    f.append("academicsigninpassword", academicsigninpassword.value);


    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                window.location = "academicspanel.php"

            } else {
                alert(t);
            }
        }
    }


    r.open("POST", "academicsigninprocess.php", true);
    r.send(f);

}


function academicschangeView() {

    var signUpBox = document.getElementById("academicssignupBox");
    var signInBox = document.getElementById("academicssigninBox");

    signUpBox.classList.toggle("d-none");
    signInBox.classList.toggle("d-none");

}


var academicsmodal;


function academicssignup() {

    var academicssignupemail = document.getElementById("academicssignupemail");

    var academicsusername = create_academicusername(6);
    var academicspassword = create_academicpassword(8);

    function create_academicusername(string_length) {
        var username = '';
        var characters = 'QWERTYUIOPLKJHGFDSAZXCVBNMqwertyuioplkjhgfdsazxcvbnm0123456789'
        for (var i, i = 0; i < string_length; i++) {
            username += characters.charAt(Math.floor(Math.random() * characters.length))

        }
        return username
    }


    function create_academicpassword(string_length) {
        var username = '';
        var characters = 'qwertyuioplkjhgfdsazxcvbnm0123456789@$#&!'
        for (var i, i = 0; i < string_length; i++) {
            username += characters.charAt(Math.floor(Math.random() * characters.length))

        }
        return username
    }


    var f = new FormData();
    f.append("academicssignupemail", academicssignupemail.value);
    f.append("academicsusername", academicsusername);
    f.append("academicspassword", academicspassword);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                alert("Verification Details has Send to Your Email");
                var academicverificationModal = document.getElementById("academicsverificationModal");
                academicsmodal = new bootstrap.Modal(academicverificationModal);
                academicsmodal.show();
            } else {
                alert(t);
            }
        }
    }

    r.open("POST", "academicsignupProcess.php", true);
    r.send(f);

}


function verifyacademics() {

    var academicsverificationusername = document.getElementById("academicsusername");
    var academicsverificationpassword = document.getElementById("academicspassword");
    var academicsverificationcode = document.getElementById("academicsvcode");

    var f = new FormData();
    f.append("academicsverificationusername", academicsverificationusername.value);
    f.append("academicsverificationpassword", academicsverificationpassword.value);
    f.append("academicsverificationcode", academicsverificationcode.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {

                academicsmodal.hide();
                alert("Verification Completed");
                window.location = "academicspanel.php"
            } else {
                alert(t);
            }
        }
    }


    r.open("POST", "academicsverificationProcess.php", true);
    r.send(f);

}


function adminsignout() {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                window.location = "adminsignin.php";
            } else {
                alert("Try Again......")
            }
        }
    };

    r.open("GET", "adminsignoutProcess.php", true);
    r.send();

}


function teachersignout() {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                window.location = "teachersignin.php";
            } else {
                alert("Try Again......")
            }
        }
    };

    r.open("GET", "teachersignoutProcess.php", true);
    r.send();

}


function academicsignout() {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                window.location = "academicsignin.php";
            } else {
                alert("Try Again......")
            }
        }
    };

    r.open("GET", "academicsignoutProcess.php", true);
    r.send();

}


function adminacademicschangeView() {

    var signUpBox = document.getElementById("adminteacherinvitation");
    var signInBox = document.getElementById("adminacademicinvitation");

    signUpBox.classList.toggle("d-none");
    signInBox.classList.toggle("d-none");

}

function blockstudent(email) {

    var request = new XMLHttpRequest();

    request.onreadystatechange = function() {
        if (request.readyState == 4) {
            var txt = request.responseText;
            if (txt == "blocked") {
                document.getElementById("ub" + email).innerHTML = "Unblock";
                document.getElementById("ub" + email).classList = "btn btn-success";
            } else if (txt == "unblocked") {
                document.getElementById("ub" + email).innerHTML = "Block";
                document.getElementById("ub" + email).classList = "btn btn-danger";
            } else {
                alert(txt);
            }
        }
    }

    request.open("GET", "studentBlockProcess.php?email=" + email, true);
    request.send();

}

function blockteacher(email) {

    var request = new XMLHttpRequest();

    request.onreadystatechange = function() {
        if (request.readyState == 4) {
            var txt = request.responseText;
            if (txt == "blocked") {
                document.getElementById("ub" + email).innerHTML = "Unblock";
                document.getElementById("ub" + email).classList = "btn btn-success";
            } else if (txt == "unblocked") {
                document.getElementById("ub" + email).innerHTML = "Block";
                document.getElementById("ub" + email).classList = "btn btn-danger";
            } else {
                alert(txt);
            }
        }
    }

    request.open("GET", "teacherBlockProcess.php?email=" + email, true);
    request.send();

}


function blockacademics(email) {

    var request = new XMLHttpRequest();

    request.onreadystatechange = function() {
        if (request.readyState == 4) {
            var txt = request.responseText;
            if (txt == "blocked") {
                document.getElementById("ub" + email).innerHTML = "Unblock";
                document.getElementById("ub" + email).classList = "btn btn-success";
            } else if (txt == "unblocked") {
                document.getElementById("ub" + email).innerHTML = "Block";
                document.getElementById("ub" + email).classList = "btn btn-danger";
            } else {
                alert(txt);
            }
        }
    }

    request.open("GET", "academicsBlockProcess.php?email=" + email, true);
    request.send();

}



function updateProfile() {
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var mobile = document.getElementById("mobile");

    var f = new FormData();
    f.append("fn", fname.value);
    f.append("ln", lname.value);
    f.append("m", mobile.value);


    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                window.location.reload();

                alert("Success");
            } else {
                alert(t);
            }
        }
    }

    r.open("POST", "updateProfileProcess.php", true);
    r.send(f);
}


function academicsupdateProfile() {

    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var mobile = document.getElementById("mobile");
    var password = document.getElementById("password");

    var f = new FormData();
    f.append("fn", fname.value);
    f.append("ln", lname.value);
    f.append("m", mobile.value);
    f.append("p", password.value);


    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                window.location.reload();

                alert("Success");
            } else {
                alert(t);
            }
        }
    }

    r.open("POST", "academicsupdateProfileProcess.php", true);
    r.send(f);

}


function teacherupdateProfile() {

    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var mobile = document.getElementById("mobile");
    var password = document.getElementById("password");

    var f = new FormData();
    f.append("fn", fname.value);
    f.append("ln", lname.value);
    f.append("m", mobile.value);
    f.append("p", password.value);


    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                window.location.reload();

                alert("Success");
            } else {
                alert(t);
            }
        }
    }

    r.open("POST", "teacherupdateProfileProcess.php", true);
    r.send(f);

}


function adminupdateProfile() {

    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var mobile = document.getElementById("mobile");
    var password = document.getElementById("password");

    var f = new FormData();
    f.append("fn", fname.value);
    f.append("ln", lname.value);
    f.append("m", mobile.value);
    f.append("p", password.value);


    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                window.location.reload();

                alert("Success");
            } else {
                alert(t);
            }
        }
    }

    r.open("POST", "adminupdateProfileProcess.php", true);
    r.send(f);

}