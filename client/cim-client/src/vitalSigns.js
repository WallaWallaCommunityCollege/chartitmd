'use strict';
require('dotenv')
    .config();
const axios = require('axios');
axios.defaults.baseURL = process.env.AXIOS_BASE_URL;
window.$ = window.jQuery = require('jquery');
window.popper = require('popper.js');
window.bootstrap = require('bootstrap');
const VitalSigns = require('./Model/VitalSigns.js');
const Patient = require('./Model/Patient');
getVitalSignsAsJson();
function getVitalSignsAsJson() {
    axios.get('patient/2Y9ovLbO93RUekOOu75TV5')
         .then(response => {
             if (response['error']) {
                 console.log(response['error']);
             } else {
                 console.log(response.data);
                 let patient = Patient.fromJson(response.data);
                 axios.get('patient/vitalSigns/2Y9ovLbO93RUekOOu75TV5')
                      .then(response => {
                          if (response['error']) {
                              console.log(response['error']);
                          } else {
                              console.log(response.data);
                              let vitalSigns = VitalSigns.fromJson(response.data, patient);
                              vitalSigns.displayDetails();
                          }
                      })
                      .catch(function (error) {
                          console.log(error);
                      });
             }
         })
         .catch(function (error) {
             console.log(error);
         });
}
