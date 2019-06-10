'use strict';
const JsonDate = require('./JsonDate');
const {DateTime} = require('luxon');
window.$ = window.jQuery = require('jquery');

/**
 * @typedef {Object} PHPUser User JSON object as returned by PHP.
 * @property {{}}
 * @property {string} name User's name
 */
/**
 *
 */
class User {
    /**
     *
     * @param {string} name
     */
    constructor(name) {
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
        /**
         *
         * @type {string}
         * @public
         * @readonly
         */
        this.name = name;
        /**
         *
         * @type {?string}
         * @public
         */
        this.password = null;
        /**
         *
         * @type {?DateTime}
         * @public
         */
        this.updatedAt = null;
    }
    /**
     *
     * @param {Object} data
     * @property {string} name
     *
     * @return this
     */
    static fromJson(data) {
        let result = new User(data.name);
        Object.keys(data)
              .forEach(function (key) {
                  if (null === data[key]) {
                      return;
                  }
                  switch (key) {
                      case 'createdAt':
                          result.setCreatedAt(data[key]);
                          break;
                      case 'createdBy':
                          result.setCreatedBy(data[key]);
                          break;
                      case 'id':
                          result.setId(data[key]);
                          break;
                      case 'name':
                          // Already set by constructor above so ignore here.
                          break;
                      case 'password':
                          result.setPassword(data[key]);
                          break;
                      case 'updatedAt':
                          result.updatedAt = JsonDate.fromJsonPHPDate(data[key]);
                          break;
                      default:
                          throw new Error(`Unknown Json property ${key} given`);
                  }
              });
        return result;
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
     * @returns {User}
     */
    setCreatedAt(value) {
        this.createdAt = JsonDate.fromJsonPHPDate(value);
        return this;
    }
    /**
     *
     * @param {Object} value
     * @returns {User}
     */
    setCreatedBy(value) {
        this.createdBy = User.fromJson(value);
        return this;
    }
    /**
     *
     * @param value
     * @returns {User}
     */
    setId(value) {
        this.id = value;
        return this;
    }
    /**
     *
     * @param value
     * @returns this
     */
    setPassword(value) {
        this.password = value;
        return this;
    }
}

module.exports = User;
