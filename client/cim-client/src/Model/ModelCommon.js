'use strict';
const JsonDate = require('./JsonDate');
const User = require('./User');

class ModelCommon {
    constructor() {
        /**
         *
         * @type {?DateTime}
         */
        this.createdAt = null;
        /**
         *
         * @type {?User}
         */
        this.createdBy = null;
        /**
         *
         * @type {string}
         */
        this.id = '';
    }
    /**
     *
     * @returns {?DateTime}
     */
    getCreatedAt() {
        return this.createdAt;
    }
    /**
     *
     * @returns {?User}
     */
    getCreatedBy() {
        return this.createdBy;
    }
    /**
     *
     * @returns {string}
     */
    getId() {
        return this.id;
    }
    /**
     *
     * @param {PHPDate} value
     * @returns this
     */
    setCreatedAt(value) {
        this.createdAt = JsonDate.fromJsonPHPDate(value);
        return this;
    }
    /**
     *
     * @param {Object} value
     * @returns this
     */
    setCreatedBy(value) {
        this.createdBy = User.fromJson(value);
        return this;
    }
    /**
     *
     * @param value
     * @returns this
     */
    setId(value) {
        this.id = value;
        return this;
    }
}

module.exports = ModelCommon;
