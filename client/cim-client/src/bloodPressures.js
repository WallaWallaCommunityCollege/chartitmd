'use strict';
require('dotenv')
    .config();
const axios = require('axios');
axios.defaults.baseURL = process.env.AXIOS_BASE_URL;
const BloodPressure = require('./Model/BloodPressure');
getBloodPressuresAsJson();
function getBloodPressuresAsJson() {
    axios.get('patient/bloodPressures/2Y9ovLbO93RUekOOu75TV5')
         // axios.get('vitalSigns/1wxoOmhY9bAHyF4cNyHn4a')
         .then(response => {
             if (response['error']) {
                 console.log(response['error']);
             } else {
                 console.log(response.data);
                 (new BloodPressure(response.data)).displayDetails();
             }
         })
         .catch(function (error) {
             console.log(error);
         });
}
