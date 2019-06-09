'use strict';
const ModelCommon = require('./ModelCommon');

class Gender extends ModelCommon {
    constructor() {
        super();
        /**
         *
         * @type {?string}
         */
        this.assignedSex = null;
        /**
         *
         * @type {?string}
         */
        this.identity = null;
        /**
         *
         * @type {?string}
         */
        this.pronoun = null;
    }
    /**
     *
     * @param {Object} data
     * @property {Object} createdAt
     * @property {Object} createdBy
     * @property {string} id
     * @property {?string} assignedSex
     * @property {?string} identity
     * @property {string} pronoun
     *
     * @return Gender
     */
    static fromJson(data) {
        let result = new Gender();
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
                      case 'assignedSex':
                          result.assignedSex = data[key];
                          break;
                      case 'identity':
                          result.identity = data[key];
                          break;
                      case 'pronoun':
                          result.pronoun = data[key];
                          break;
                      default:
                          throw `Unknown Json property ${key} given`;
                  }
              });
        return result;
    }
}

module.exports = Gender;
