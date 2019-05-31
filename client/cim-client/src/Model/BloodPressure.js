'use strict';
const JsonDate = require('./JsonDate.js');
const DisplayTable = require('./DisplayTable');

class BloodPressure {
    constructor(data) {
        /**
         * @type {object} data The raw JSON object as from Axios response.
         */
        this.data = data;
        this.displayItems = ['systolic', 'diastolic'];
        this.idBase = '#patient-bloodPressures-';
    }
    displayDetails() {
        (new DisplayTable(this.data, this.idBase)).displayTable();
    }
}

module.exports = BloodPressure;
