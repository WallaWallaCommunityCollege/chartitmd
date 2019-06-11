'use strict';
require('dotenv')
    .config();
const axios = require('axios');
axios.defaults.baseURL = process.env.AXIOS_BASE_URL;
window.$ = window.jQuery = require('jquery');
window.popper = require('popper.js');
window.bootstrap = require('bootstrap');
const VitalSigns = require('./Model/VitalSigns');
const Patient = require('./Model/Patient');
getVitalSignsAsJson();
function getVitalSignsAsJson() {
    let patient;
    axios.get('patient/2Y9ovLbO93RUekOOu75TV5')
         .then(response1 => {
             if (response1['error']) {
                 console.log(response1['error']);
             } else {
                 console.log('Axios patient:');
                 console.log(response1.data);
                 try {
                     patient = Patient.fromJson(response1.data);
                 } catch (error) {
                     console.log(error);
                 }
                 axios.get('patient/vitalSigns/2Y9ovLbO93RUekOOu75TV5')
                      .then(response2 => {
                          if (response2['error']) {
                              console.log(response2['error']);
                          } else {
                              console.log('Axios vital signs:');
                              console.log(response2.data[0]);
                              let vitalSigns = VitalSigns.fromJson(response2.data[0], patient);
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
