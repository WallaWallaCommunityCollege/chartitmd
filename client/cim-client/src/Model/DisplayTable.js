'use strict';
const JsonDate = require('./JsonDate.js');
window.$ = window.jQuery = require('jquery');

class DisplayTable {
    /**
     *
     * @param {object} obj
     * @param {string} idBase
     * @param {string[]} [displayItems]
     */
    constructor(obj, idBase, displayItems) {
        this.obj = obj;
        this.idBase = idBase;
        this.displayItems = undefined;
        if (displayItems !== undefined) {
            this.displayItems = displayItems;
        } else {
            this.displayItems = Object.keys(obj);
            if (Array.isArray(obj)) {
                this.displayItems = Object.keys(obj[0]);
            }
        }
        console.log('constructor: ' + this.displayItems);
    }
    /**
     *
     */
    displayTable() {
        this.displayThead();
        this.displayTfoot();
        this.displayTbody();
    }
    /**
     *
     */
    displayTbody() {
        let rows = this.obj;
        if (!Array.isArray(this.obj)) {
            rows = [this.obj];
        }
        console.log('rows= ' + rows);
        for (let i = 0; i < rows.length; i++) {
            this.displayTbodyRow(rows[i]);
        }
    }
    displayTbodyRow(row) {
        let tbody = $(this.idBase + 'table tbody');
        // noinspection CheckTagEmptyBody
        let tr = $('<tr></tr>');
        for (let i = 0; i < this.displayItems.length; i++) {
            tr.append(`<td>${row[this.displayItems[i]]}</td>`);
        }
        tr.append('<td>&nbsp;</td>');
        tbody.append(tr);
    }
    /**
     *
     */
    displayTfoot() {
        let tfoot = $(this.idBase + 'table tfoot tr');
        for (let i = 0; i < this.displayItems.length; i++) {
            let itemName = this.idBase + this.displayItems[i];
            let td = $(`<td><input id="${itemName}" name="${itemName}"></td>`);
            tfoot.append(td);
        }
        tfoot.append('<td><input type="submit" value="Add"></td>');
    }
    /**
     *
     */
    displayThead() {
        let thead = $(this.idBase + 'table thead tr');
        for (let i = 0; i < this.displayItems.length; i++) {
            // Convert from lowerCamelCase to "Title Case" for label.
            let labelText = this.displayItems[i].replace(/([a-z0-9])([A-Z])/g, '$1 $2')
                                                .toLowerCase()
                                                .split(' ')
                                                .map(function (word) {
                                                    return (word.charAt(0)
                                                                .toUpperCase() + word.slice(1));
                                                })
                                                .join('&nbsp;');
            let th = $(`<th scope="col">${labelText}</th>`);
            thead.append(th);
        }
        thead.append('<th>Action</th>');
    }
}

module.exports = DisplayTable;
