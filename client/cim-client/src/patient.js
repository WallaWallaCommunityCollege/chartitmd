'use strict';
require('dotenv')
    .config();
const axios = require('axios');
const Patient = require('./Model/Patient.js');
// Config Axios defaults.
axios.defaults.baseURL = process.env.AXIOS_BASE_URL;
// Setup JQuery
window.$ = window.jQuery = require('jquery');
getPatientAsJson();


/**
 * Simple wrapper around an Axios call to get extended patient detail and display it.
 */
function getPatientAsJson() {
    axios.get('/patient/2Y9ovLbO93RUekOOu75TV5')
         .then(response => {
             $(document)
                 .ready(() => {
                     (
                         new Patient(response.data)
                     ).displayDetails(['recentBloodPressures', 'recentHeights', 'recentWeights']);
                 });
         })
         .catch(function (error) {
             console.log(error);
         });
}
