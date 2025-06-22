function validateForm() {
    var oldPw = document.forms["myForm"]["pw"].value;
    var newPw = document.forms["myForm"]["new_Pw"].value;
    var conPw = document.forms["myForm"]["con_Pw"].value;

    if (oldPw == "" || newPw == "" || conPw == "") {
        alert("All fields must be filled out");
        return false;
    }


    var pwPattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
    if (!pwPattern.test(newPw)) {
        alert("New password must be at least 8 characters long and contain at least one digit, one lowercase letter, and one uppercase letter");
        return false;
    }

    if (newPw !== conPw) {
        alert("New password and confirm password dosen't match");
        return false;
    }

    return true;
}

function checkPasswords() {
    var Password = document.getElementById("Pw").value;
    var confirmPassword = document.getElementById("con_Pw").value;

    if (Password !== confirmPassword) {
        alert("Password dosen't match.");
        return false;
    }

    alert("Passwords match.");
    return true;
}