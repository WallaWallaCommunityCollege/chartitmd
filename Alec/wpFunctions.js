function changeText() {
    document.getElementById("testLabel").innerHTML = "Im an alert";
}

function isLoginNull() {
    if (document.getElementById("userName").value == "" || document.getElementById("passWord").value == "") {
        document.getElementById("errorMessage").innerHTML = "Login username and/or password is null";
    }
}