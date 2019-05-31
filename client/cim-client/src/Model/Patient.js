'use strict';
const JsonDate = require('./JsonDate.js');
const DisplayTable = require('./DisplayTable');
window.$ = window.jQuery = require('jquery');

/**
 *
 */
class Patient {
    /**
     *
     * @param data
     */
    constructor(data) {
        /**
         * @type {object} data The raw JSON object as from Axios response.
         */
        this.data = data;
    }
    /**
     * Calculates Body Mass Index (BMI) from height and weight.
     *
     * @param {number} height Height in centimeters (cm)
     * @param {number} weight weight in Kilograms (kg)
     *
     * @returns {string}
     */
    static getBMI(height, weight) {
        return (weight / Math.pow(height / 100, 2)).toFixed(1);
    }
    /**
     * Calculates Body Surface Area (BSA) from height and weight.
     *
     * @param {number} height Height in centimeters (cm)
     * @param {number} weight weight in Kilograms (kg)
     *
     * @returns {string}
     */
    static getBSA(height, weight) {
        return (Math.sqrt(height * weight) / 60).toFixed(1);
    }
    displayBMIAndBSA() {
        if (undefined === this.data['recentHeights'] || undefined === this.data['recentWeights']) {
            $('#patient-bmi-item')
                .hide();
            $('#patient-bsa-item')
                .hide();
            return;
        }
        $('#patient-bmi')
            .text(Patient.getBMI(this.data['recentHeights'][0]['height'], this.data['recentWeights'][0]['weight']));
        $('#patient-bsa')
            .text(Patient.getBSA(this.data['recentHeights'][0]['height'], this.data['recentWeights'][0]['weight']));
    }
    displayDetails() {
        console.log(this.data['patient']);
        (new DisplayTable(this.data['patient'], 'patient-')).displayTable();
        this.displayGeneralDetails();
    }
    /**
     *
     */
    displayGeneralDetails() {
        const patient = this.data['patient'];
        let dob = JsonDate.fromJsonPHPDate(patient['dateOfBirth']);
        // let dob = DateTime.fromSQL(patient['dateOfBirth']['date']);
        let age = Math.floor(Math.abs(dob.diffNow('year')
                                         .as('year')));
        $('#patient-age')
            .text(age);
        $('#patient-assignedSex')
            .val(patient['gender']['assignedSex']);
        let createdAt = JsonDate.fromJsonPHPDate(patient['createdAt']);
        $('#patient-createdAt')
            .val(createdAt.toFormat('yyyy-MM-dd'));
        $('#patient-dateOfBirth')
            .val(dob.toFormat('yyyy-MM-dd'));
        $('#patient-firstName')
            .val(patient['firstName']);
        $('#patient-id')
            .val(patient['id']);
        $('#patient-lastName')
            .val(patient['lastName']);
        if (null === patient['updatedAt']) {
            $('#patient-updatedAt')
                .hide();
        } else {
            let updatedAt = JsonDate.fromJsonPHPDate(patient['updatedAt']);
            // let updatedAt = DateTime.fromSQL(patient['updatedAt']['date']);
            $('#patient-updatedAt')
                .val(updatedAt.toFormat('yyyy-MM-dd'));
        }
    }
    displayRecentBloodPressures() {
        if (undefined === this.data['recentBloodPressures']) {
            $('#patient-bloodPressures-may-show')
                .hide();
            return;
        }
        const recentBloodPressures = this.data['recentBloodPressures'];
        $('#patient-bloodPressure-diastolic')
            .text(recentBloodPressures[0]['diastolic']);
        $('#patient-bloodPressure-systolic')
            .text(recentBloodPressures[0]['systolic']);
        let createdAt = JsonDate.fromJsonPHPDate(recentBloodPressures[0]['createdAt']);
        $('#patient-bloodPressure-createdAt')
            .val(createdAt.toFormat('yyyy-MM-dd'));
        $('#patient-bloodPressure-id')
            .val(recentBloodPressures[0]['id']);
    }
    displayRecentHeights() {
        if (undefined === this.data['recentHeights']) {
            $('#patient-heights-dont-show')
                .hide();
            return;
        }
        const recentHeights = this.data['recentHeights'];
        $('#patient-height-height')
            .val(recentHeights[0]['height']);
        let createdAt = JsonDate.fromJsonPHPDate(recentHeights[0]['createdAt']);
        $('#patient-height-createdAt')
            .val(createdAt.toFormat('yyyy-MM-dd'));
        $('#patient-height-id')
            .val(recentHeights[0]['id']);
    }
    displayRecentWeights() {
        if (undefined === this.data['recentWeights']) {
            $('#patient-weights-dont-show')
                .hide();
            return;
        }
        const recentWeights = this.data['recentWeights'];
        $('#patient-weight-weight')
            .val(recentWeights[0]['weight']);
        let createdAt = JsonDate.fromJsonPHPDate(recentWeights[0]['createdAt']);
        $('#patient-weight-createdAt')
            .val(createdAt.toFormat('yyyy-MM-dd'));
        $('#patient-weight-id')
            .val(recentWeights[0]['id']);
    }
}

module.exports = Patient;
