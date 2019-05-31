'use strict';
const JsonDate = require('./JsonDate');
const DisplayTable = require('./DisplayTable');
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
        this.displayItems = ['systolic', 'diastolic', 'pulseRate', 'respirationRate', 'temperature', 'pain'];
        this.idBase = '#patient-vitalSigns-';
    }
    displayDetails() {
        (new DisplayTable(this.data, this.idBase, this.displayItems)).displayTable();
    }
}

module.exports = VitalSigns;
