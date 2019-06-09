'use strict';
const JsonDate = require('./JsonDate');
const {DateTime} = require('luxon');
const ModelCommon = require('./ModelCommon');
window.$ = window.jQuery = require('jquery');

/**
 * @typedef {Object} PHPUser User JSON object as returned by PHP.
 * @property {{}}
 * @property {string} name User's name
 */
/**
 *
 */
class User extends ModelCommon {
    /**
     *
     * @param {string} name
     */
    constructor(name) {
        super();
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
     * @param value
     * @returns this
     */
    setPassword(value) {
        this.password = value;
        return this;
    }
}

module.exports = User;
