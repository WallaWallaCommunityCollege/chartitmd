'use strict';
require('dotenv')
    .config();
const axios = require('axios');
window.$ = window.jQuery = require('jquery');
axios.defaults.baseURL = process.env.AXIOS_BASE_URL;
const VitalSigns = require('./Model/VitalSigns.js');
getVitalSignsAsJson();
function getVitalSignsAsJson() {
    axios.get('vitalSigns/1wxoOmhY9bAHyF4cNyHn4a')
         .then(response => {
             console.log(response.data);
             (new VitalSigns(response.data)).displayDetails([]);
         })
         .catch(function (error) {
             console.log(error);
         });
}
