'use strict';
const JsonDate = require('./JsonDate.js');
window.$ = window.jQuery = require('jquery');

/**
 *
 */
class VitalSigns {
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
     *
     * @param options
     */
    displayDetails(options = []) {
        $('#patient-vitalSign-diastolic')
            .text(this.data['diastolic']);
        $('#patient-vitalSign-systolic')
            .text(this.data['systolic']);
        $('#patient-vitalSign-pulseRate')
            .text(this.data['pulseRate']);
        $('#patient-vitalSign-respirationRate')
            .text(this.data['respirationRate']);
        $('#patient-vitalSign-temperature')
            .text(this.data['temperature']);
        $('#patient-vitalSign-temperatureMethod')
            .text(this.data['temperatureMethod']['name']);
        $('#patient-vitalSign-pain')
            .text(this.data['pain']);
        $('#patient-vitalSign-painLocation')
            .text(this.data['painLocation']['name']);
        let createdAt = JsonDate.fromJsonPHPDate(this.data['createdAt']);
        $('#patient-vitalSign-createdAt')
            .val(createdAt.toFormat('yyyy-MM-dd'));
        $('#patient-vitalSign-id')
            .val(this.data['id']);
    }
}

module.exports = VitalSigns;
