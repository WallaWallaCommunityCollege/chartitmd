'use strict';
const ModelCommon = require('./ModelCommon');

/**
 *
 */
class MeasurementLimits extends ModelCommon {
    constructor() {
        super();
        /**
         *
         * @type {?string}
         */
        this.description = null;
        /**
         *
         * @type {?string}
         */
        this.name = null;
        /**
         *
         * @type {?number}
         */
        this.maximum = Infinity;
        /**
         *
         * @type {?number}
         */
        this.minimum = -Infinity;
        /**
         *
         * @type {number}
         */
        this.sigmaMinus1 = -Infinity;
        /**
         *
         * @type {number}
         */
        this.sigmaMinus2 = -Infinity;
        /**
         *
         * @type {number}
         */
        this.sigmaMinus3 = -Infinity;
        /**
         *
         * @type {number}
         */
        this.sigmaPlus1 = Infinity;
        /**
         *
         * @type {number}
         */
        this.sigmaPlus2 = Infinity;
        /**
         *
         * @type {number}
         */
        this.sigmaPlus3 = Infinity;
        /**
         *
         * @type {number}
         */
        this.stepSize = 1.0;
    }
    /**
     *
     * @param {Object} data
     * @property {Object} createdAt
     * @property {Object} createdBy
     * @property {string} id
     * @property {?string} description
     * @property {?string} maximum
     * @property {?string} minimum
     * @property {string} name
     * @property {?string} sigmaMinus1
     * @property {?string} sigmaMinus2
     * @property {?string} sigmaMinus3
     * @property {?string} sigmaPlus1
     * @property {?string} sigmaPlus2
     * @property {?string} sigmaPlus3
     *
     * @return MeasurementLimits
     */
    static fromJson(data) {
        let result = new MeasurementLimits();
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
                      case 'maximum':
                      case 'minimum':
                      case 'name':
                      case 'sigmaMinus1':
                      case 'sigmaMinus2':
                      case 'sigmaMinus3':
                      case 'sigmaPlus1':
                      case 'sigmaPlus2':
                      case 'sigmaPlus3':
                      case 'stepSize':
                          result[key] = data[key];
                          break;
                      default:
                          throw new Error(`Unknown Json property ${key} given`);
                  }
              });
        return result;
    }
}

module.exports = MeasurementLimits;
