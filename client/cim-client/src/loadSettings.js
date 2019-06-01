'use strict';
require('dotenv')
    .config();
const axios = require('axios');
// Config Axios defaults.
axios.defaults.baseURL = process.env.AXIOS_BASE_URL;
// Setup JQuery
window.$ = window.jQuery = require('jquery');
const Settings = require('./Model/Settings.js');

let pageBody = document.getElementById("pageBody");

getSettingsAsJson();

let bgColor = "#ABCDEF";
let textColor = "#7D2AC2";

try{
    pageBody.style.cssText =
        `background-color: ${bgColor} !important;
         color: ${textColor} !important;`;
}
catch(e){
    alert(e);
    console.log(e);
}

//Set style properties to database values
function getSettingsAsJson(){
    axios.get('patient/settings/')
        .then(response => {
            (new Settings(response.data)).displayDetails();
        })
        .catch(function (error){
           console.log(error);
        });
}