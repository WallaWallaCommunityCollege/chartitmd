'use strict';
const ModelCommon = require('./ModelCommon');

class Location extends ModelCommon {
    constructor() {
        super();
        this.name = null;
        this.abbreviation = null;
        this.description = null;
    }
    /**
     *
     * @param {Object} data
     * @property {Object} createdAt
     * @property {Object} createdBy
     * @property {string} id
     * @property {?string} abbreviation
     * @property {?string} description
     * @property {string} name
     *
     * @return Location
     */
    static fromJson(data) {
        let result = new Location();
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
                      case 'abbreviation':
                          result.abbreviation = data[key];
                          break;
                      case 'description':
                          result.description = data[key];
                          break;
                      case 'name':
                          result.name = data[key];
                          break;
                      default:
                          throw `Unknown Json property ${key} given`;
                  }
              });
        return result;
    }
}

module.exports = Location;
