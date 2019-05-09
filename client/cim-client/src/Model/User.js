'use strict';
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
         * @public
         */
        this.createdAt = null;
        /**
         *
         * @type {?string}
         * @public
         * @readonly
         */
        this.id = null;
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
     * @return User
     */
    static fromJson(data) {
        let user = new User(data.name);
        Object.keys(data)
              .forEach(function (key) {
                  switch (key) {
                      case 'createdAt':
                      case 'updatedAt':
                          if (null !== data[key]) {
                              // noinspection JSCheckFunctionSignatures
                              user[key] = DateTime.fromSQL(data[key]['date'], {zone: data[key]['timezone']});
                          }
                          break;
                      case 'name':
                          // Already set by constructor so ignore.
                          break;
                      default:
                          if (user.hasOwnProperty(key)) {
                              user[key] = data[key];
                          }
                  }
              });
        return user;
    }
}

module.exports = User;
