'use strict';
const {DateTime} = require('luxon');

/**
 * @typedef {object} PHPDate
 * @property {string} date ISO8601 like date-time without time zone.
 * @property {number} [timezone_type] From PHP date-time (internal).
 * @property {string} timezone Time zone of the given date.
 */
/**
 *
 */
class JsonDate extends DateTime {
    /**
     *
     * @param {PHPDate} date
     * @returns {DateTime}
     */
    static fromJsonPHPDate(date) {
        // noinspection JSCheckFunctionSignatures
        return super.fromSQL(date['date'], {'zone': date['timezone']});
    }
}

module.exports = JsonDate;
