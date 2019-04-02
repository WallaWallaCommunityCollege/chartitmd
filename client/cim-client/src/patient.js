'use strict';
require('dotenv')
    .config();
const axios = require('axios');
const {DateTime} = require('luxon');
// config axios defaults.
axios.defaults.baseURL = process.env.AXIOS_BASE_URL;
// Setup JQuery
window.$ = window.jQuery = require('jquery');
function getPatientAsJson() {
    axios.get('/patient/2Y9ovLbO93RUekOOu75TV5')
         .then(res => {
             const patient = res.data['patient'];
             const recentBloodPressures = res.data['recentBloodPressures'];
             const recentHeights = res.data['recentHeights'];
             const recentWeights = res.data['recentWeights'];
             let dob = DateTime.fromSQL(patient['dateOfBirth']['date']);
             let age = Math.floor(Math.abs(dob.diffNow('year')
                                              .as('year')));
             $("#patient-age")
                 .text(age);
             $("#patient-dateOfBirth")
                 .val(dob.toFormat('yyyy-MM-dd'));
             $("#patient-firstName")
                 .val(patient['firstName']);
             $("#patient-lastName")
                 .val(patient['lastName']);
             $("#patient-id")
                 .val(patient['id']);
             $("#patient-assignedSex")
                 .val(patient['gender']['assignedSex']);
             if (undefined !== recentHeights) {
                 $("#patient-height")
                     .val(recentHeights[0]['height']);
                 let createdAt = DateTime.fromSQL(recentHeights[0]['createdAt']['date']);
                 $("#patient-height-createdAt")
                     .val(createdAt.toFormat('yyyy-MM-dd'));
                 $("#patient-height-id")
                     .val(recentHeights[0]['id']);
             } else {
                 $("#patient-height")
                     .closest("details")
                     .hide();
             }
             if (undefined === recentWeights) {
                 $("#patient-weight")
                     .closest("label")
                     .hide();
             } else {
                 $("#patient-weight")
                     .val(recentWeights[0]['weight']);
                 let createdAt = DateTime.fromSQL(recentWeights[0]['createdAt']['date']);
                 $("#patient-weight-createdAt")
                     .val(createdAt.toFormat('yyyy-MM-dd'));
                 $("#patient-weight-id")
                     .val(recentWeights[0]['id']);
             }
             if (undefined === recentHeights || undefined === recentWeights) {
                 $("#patient-bmi")
                     .closest("label")
                     .hide();
                 $("#patient-bsa")
                     .closest("label")
                     .hide();
             } else {
                 $("#patient-bmi")
                     .text(getBMI(recentHeights[0]['height'], recentWeights[0]['weight']));
                 $("#patient-bsa")
                     .text(getBSA(recentHeights[0]['height'], recentWeights[0]['weight']));
             }
         });
}
/**
 *
 * @param {number} height
 * @param {number} weight
 * @returns {string}
 */
function getBMI(height, weight) {
    return (
        weight / Math.pow(height / 100, 2)
    ).toFixed(1);
}
/**
 *
 * @param {number} height
 * @param {number} weight
 * @returns {string}
 */
function getBSA(height, weight) {
    return (
        Math.sqrt(height * weight) / 60
    ).toFixed(1);
}
$(document)
    .ready(function () {
        getPatientAsJson();
    });
