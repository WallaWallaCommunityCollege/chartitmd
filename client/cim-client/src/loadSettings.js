//Grab settings from database
window.$ = window.jQuery = require('jquery');

let pageBody = document.getElementById("pageBody");

let bgColor= "#ABCDEF";
let textColor = "#7D2AC2";
try{
    pageBody.style.cssText = `background-color: ${bgColor} !important; color: ${textColor} !important;`;
}
catch(e){
    alert(e);
    console.log(e);
}

//Set style properties to database values