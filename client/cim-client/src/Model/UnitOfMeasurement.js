'use strict';
const ModelCommon = require('./ModelCommon');

class UnitOfMeasurement extends ModelCommon {
    constructor() {
        super();
    }
    /**
     *
     * @param {Object} data
     * @property {Object} createdAt
     * @property {Object} createdBy
     * @property {string} id
     * @property {?string} description
     * @property {string} name
     * @property {?Object} measurementRange
     * @property {?string} symbol
     * @property {?string} unitOf
     *
     * @return UnitOfMeasurement
     */
    static fromJson(data) {
        let result = new UnitOfMeasurement();
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
                      case 'description':
                          result.description = data[key];
                          break;
                      case 'name':
                          result.name = data[key];
                          break;
                      case 'measurementRange':
                          break;
                      case 'symbol':
                          result.symbol = data[key];
                          break;
                      case 'unitOf':
                          break;
                      default:
                          throw new Error(`Unknown Json property ${key} given`);
                  }
              });
        return result;
    }
}

module.exports = UnitOfMeasurement;
