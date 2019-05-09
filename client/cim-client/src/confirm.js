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