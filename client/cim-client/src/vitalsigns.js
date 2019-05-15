'use strict';
require('dotenv')
    .config();
const axios = require('axios');
const Patient = require('./Model/Patient.js');
window.$ = window.jQuery = require('jquery');
axios.defaults.baseURL = process.env.AXIOS_BASE_URL;

function getVSAsJson(){
    axios.get('VitalSigns')
}

function loadReport(){
    //Get each row
    // foreach(vitalSigns as vital){
    //
    // }

    try{
        $.get("../../../src/Model/Entity/VitalSigns.php", function(data){
            $("body").append("Name: ") + data.createdAt;
        })
    }
    catch(exception){
        console.log(exception);
    }
    let template = document.querySelector('#row-template');

    let table = document.querySelector("tbody");
    let clone = document.importNode(template.content, true);

    document.getElementById("output").innerHTML = clone.DOCUMENT_FRAGMENT_NODE;
    table.appendChild(clone);
}

function backUp(){
    window.location.href = "index.html";
}

loadReport();
document.getElementById("backUp").addEventListener("click", backUp);