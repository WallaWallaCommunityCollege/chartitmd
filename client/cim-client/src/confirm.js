const {app, BrowserWindow} = require('electron');
const path = require('path');
const url = require('url');

let userLog = sessionStorage.getItem("UserName");
let passLog = sessionStorage.getItem("PassWord");
/*
    TODO: Have the username and password
        be compared with the users in the database
        If the input matches one of the row's username
        and password values, log in. Otherwise return
        an error and return to login page

    TODO: Mike's Add - I've updated the login html and js so
        it uses POST instead of GET request and sends the username
        and password to the server as expected per src/route.php file.
        This page is probably not needed now as the session stuff can
        be done there instead. Client side checking doesn't really work
        since actual password is not returned just a hash but that is
        normally blocked from the JSON response server side by default.
 */



checkUser(userLog, passLog);



function checkUser(username, password){
    //retrieve user table from the database
    let testName = "user";
    let testWord = "pass";
    if(username !== testName && password !== testWord){
        window.location.href = "login.html";
    } else {
        document.getElementById("confirmation").innerHTML = "Login Confirmed";
    }
}
