'use strict';
require('dotenv')
    .config();
const axios = require('axios');
// Config Axios defaults.
axios.defaults.baseURL = process.env.AXIOS_BASE_URL;
const Patient = require('./Model/Patient.js');
// Setup JQuery
window.$ = window.jQuery = require('jquery');
getPatientAsJson();
/**
 * Simple wrapper around an Axios call to get extended patient detail and display it.
 */
function getPatientAsJson() {
    axios.get('/patient/2Y9ovLbO93RUekOOu75TV5')
         .then(response => {
             if (response['error']) {
                 console.log(response['error']);
             } else {
                 $(document)
                     .ready(() => {
                         // Switched buttons to use jquery and ensure DOM is fully loaded before adding.
                         $('#summary')
                             .on('click', function () {
                                 window.location.href = "summary.html";
                             });
                         $('#vitalSigns')
                             .on('click', function () {
                                 window.location.href = "vitalSigns.html";
                             });
                         $('#settings')
                             .on('click', function () {
                                 window.location.href = "settings.html";
                             });
                         console.log(response.data);
                         let patient = Patient.fromJson(response.data);
                         patient.displayDetails();
                     });
             }
         })
         .catch(function (error) {
             console.log(error);
         });
}
