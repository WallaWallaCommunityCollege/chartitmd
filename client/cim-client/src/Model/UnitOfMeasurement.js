'use strict';
const ModelCommon = require('./ModelCommon');
const MeasurementLimits = require('./MeasurementLimits');

class UnitOfMeasurement extends ModelCommon {
    constructor() {
        super();
        /**
         *
         * @type {?string}
         */
        this.description = null;
        /**
         *
         * @type {?MeasurementLimits}
         */
        this.measurementLimits = null;
        /**
         *
         * @type {?string}
         */
        this.name = null;
        /**
         *
         * @type {?string}
         */
        this.symbol = null;
        /**
         *
         * @type {?string}
         */
        this.unitOf = null;
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
                      case 'name':
                      case 'symbol':
                      case 'unitOf':
                          result[key] = data[key];
                          break;
                      case 'measurementLimits':
                          result[key] = MeasurementLimits.fromJson(data[key]);
                          break;
                      default:
                          throw new Error(`Unknown Json property ${key} given`);
                  }
              });
        return result;
    }
}

module.exports = UnitOfMeasurement;
