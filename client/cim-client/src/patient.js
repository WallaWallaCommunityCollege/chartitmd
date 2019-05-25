'use strict';
require('dotenv')
    .config();
const axios = require('axios');
// Config Axios defaults.
axios.defaults.baseURL = process.env.AXIOS_BASE_URL;
// Setup JQuery
window.$ = window.jQuery = require('jquery');
const Patient = require('./Model/Patient.js');
getPatientAsJson();
document.getElementById("summary")
        .addEventListener("click", function () {
            alert("clicked");
            window.location.href = "summary.html";
        });
document.getElementById("vitalSigns")
        .addEventListener("click", function () {
            window.location.href = "vitalSigns.html";
        });
document.getElementById("settings")
        .addEventListener("click", function () {
            window.location.href = "settings.html";
        });
/**
 * Simple wrapper around an Axios call to get extended patient detail and display it.
 */
function getPatientAsJson() {
    axios.get('/patient/2Y9ovLbO93RUekOOu75TV5')
         .then(response => {
             $(document)
                 .ready(() => {
                     (new Patient(response.data)).displayDetails(['recentBloodPressures', 'recentHeights', 'recentWeights']);
                 });
         })
         .catch(function (error) {
             console.log(error);
         });
}
