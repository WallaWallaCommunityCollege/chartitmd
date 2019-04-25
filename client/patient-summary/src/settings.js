
'use strict';
const electron = require('electron');
const path = require('path');
const url = require('url');
const axios = require('axios');

let textColor = "#000000";
let backgroundColor = "#000000";

let visibleObjects = {

    weight: true,
    height: true,
    bsa: true,
    bmi: true
};
window.confirm("page loaded");

function applyChanges(textColor, backgroundColor){
    textColor = "#234678";
    backgroundColor = "#ABCEDF"
    document.getElementById("applyText").innerHTML = "Text changed to " + textColor;
    document.getElementById("applyText2").innerHTML = "Background color changed to " + backgroundColor;
    window.confirm("Apply ran");
}

function displayColorBlind(){

}