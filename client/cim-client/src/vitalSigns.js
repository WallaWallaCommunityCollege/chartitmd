'use strict';
require('dotenv')
    .config();
const axios = require('axios');
// const Patient = require('./Model/Patient.js');
window.$ = window.jQuery = require('jquery');
axios.defaults.baseURL = process.env.AXIOS_BASE_URL;

function getVitalSignsAsJson() {
    axios.get('patient/vitalSigns/2Y9ovLbO93RUekOOu75TV5')
         .then(response => {
             console.log(response.data);
         })
         .catch(function (error) {
             console.log(error);
         });
}

// function loadReport() {
//     //Get each row
//     // foreach(vitalSigns as vital){
//     //
//     // }
//
//     try {
//         $.get("../../../src/Model/Entity/VitalSigns.php", function (data) {
//             $("body")
//                 .append("Name: ") + data.createdAt;
//         })
//     } catch (exception) {
//         console.log(exception);
//     }
//     let template = document.querySelector('#row-template');
//
//     let table = document.querySelector("tbody");
//     let clone = document.importNode(template.content, true);
//
//     document.getElementById("output").innerHTML = clone.DOCUMENT_FRAGMENT_NODE;
//     table.appendChild(clone);
// }

function backUp() {
    window.location.href = "index.html";
}

// loadReport();
getVitalSignsAsJson();
// document.getElementById("backUp")
//         .addEventListener("click", backUp);
