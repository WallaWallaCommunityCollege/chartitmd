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
        this.displayThead();
        this.displayTfoot();
        this.displayTbody();
    }
    /**
     *
     */
    displayTbody() {
        let displayItems = ['systolic', 'diastolic', 'pulseRate', 'respirationRate', 'temperature', 'pain'];
        let tbody = $('#patient-vitalSigns-table tbody');
        let tr = $('<tr></tr>');
        for (let i = 0; i < displayItems.length; i++) {
            tr.append(`<td>${this.data[displayItems[i]]}</td>`);
        }
        tr.append('<td>&nbsp;</td>');
        tbody.append(tr);
    }
    /**
     *
     */
    displayTfoot() {
        let displayItems = ['systolic', 'diastolic', 'pulseRate', 'respirationRate', 'temperature', 'pain'];
        let tfoot = $('#patient-vitalSigns-table tfoot tr');
        for (let i = 0; i < displayItems.length; i++) {
            let itemName = 'patient-vitalSign-' + displayItems[i];
            let td = $(`<td><input id="${itemName}" name="${itemName}"></td>`);
            tfoot.append(td);
        }
        tfoot.append('<td><input type="submit" value="Add"></td>');
    }
    /**
     *
     */
    displayThead() {
        let displayItems = ['systolic', 'diastolic', 'pulseRate', 'respirationRate', 'temperature', 'pain'];
        let thead = $('#patient-vitalSigns-table thead tr');
        for (let i = 0; i < displayItems.length; i++) {
            // Convert from lowerCamelCase to "Title Case" for label.
            let labelText = displayItems[i].replace(/([a-z0-9])([A-Z])/g, '$1 $2')
                                           .toLowerCase()
                                           .split(' ')
                                           .map(function (word) {
                                               return (word.charAt(0)
                                                           .toUpperCase() + word.slice(1));
                                           })
                                           .join(' ');
            let th = $(`<th>${labelText}</th>`);
            thead.append(th);
        }
        thead.append('<th>Action</th>');
    }
}

module.exports = VitalSigns;
