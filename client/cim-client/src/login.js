'use strict';
require('dotenv')
    .config();
const axios = require('axios');
// Config Axios defaults.
axios.defaults.baseURL = process.env.AXIOS_BASE_URL;
const User = require('./Model/User.js');
const querystring = require('querystring');
// Setup JQuery
window.$ = window.jQuery = require('jquery');
function login() {
    // Using jquery
    let name = $('#username')
        .val();
    let password = $('#password')
        .val();
    axios.post('user/login', `user={"name":"${name}","password":"${password}"}`)
         .then(response => {
             if (response['error']) {
                 console.log(response['error']);
             } else {
                 let user = User.fromJson(response.data);
                 console.log(user);
                 console.log('user.name = ' + user.name);
                 //TODO: Do something useful with user here.
             }
         })
         .catch(function (error) {
             console.log(error);
         });
}
function attemptLogin() {
    login();
    /*let input = {
        username: document.getElementById("userLog").value,
        password: document.getElementById("passLog").value
    };

    sessionStorage.setItem("UserName", document.getElementById("userLog").value);
    sessionStorage.setItem("PassWord", document.getElementById("passLog").value);
    window.location.href = "confirm.html";*/
}
// Using jquery
$('#login')
    .click(attemptLogin);
// document.getElementById("login").addEventListener("click", attemptLogin);
//source cited
//https://developer.mozilla.org/en-US/docs/Web/API/KeyboardEvent
//The document adds an event listener that is key down and uses an event that gets the event key, checks what key has been pressed,
//then either tries to login or returns to the index page.
document.addEventListener('keydown', (event) => {
    const inputKey = event.key;
    if (inputKey === 'Enter') {
        attemptLogin();
    }
});
// Think this would do the same thing as above for jquery but not sure.
// $().keydown((e)=>{
//  if(e.which() === 'Enter') {
//      attemptLogin();
//  }
// });
