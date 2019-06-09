'use strict';
const ModelCommon = require('./ModelCommon');
const Location = require('./Location');
const Method = require('./Method');
const Patient = require('./Patient');
const UnitOfMeasurement = require('./UnitOfMeasurement');
window.$ = window.jQuery = require('jquery');

class Measurement extends ModelCommon {
    /**
     *
     * @param {?Patient} patient
     */
    constructor(patient = null) {
        super();
        /**
         *
         * @type {?Location}
         * @public
         */
        this.location = null;
        /**
         *
         * @type {?UnitOfMeasurement}
         * @public
         */
        this.measuredIn = null;
        /**
         *
         * @type {?Method}
         * @public
         */
        this.methodUsed = null;
        /**
         *
         * @type {string|number}
         */
        this.measurement = '';
        /**
         *
         * @type {?Patient}
         */
        this.patient = patient;
    }
    /**
     *
     * @param {Object} data
     * @property {Object} createdAt
     * @property {Object} createdBy
     * @property {string} id
     * @property {string|number} measurement
     * @property {?Object} patient
     * @property {?Object} location
     * @property {?Object} measuredIn
     * @property {?Object} methodUsed
     * @param {?Patient} patient
     *
     * @return Measurement
     */
    static fromJson(data, patient = null) {
        let result = new Measurement(patient);
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
                      case 'patient':
                          if (null === result.patient) {
                              result.patient = Patient.fromJson(data[key]);
                          }
                          break;
                      case 'location':
                          result.location = Location.fromJson(data[key]);
                          break;
                      case 'measuredIn':
                          result.measuredIn = UnitOfMeasurement.fromJson(data[key]);
                          break;
                      case 'measurement':
                          result.measurement = data[key];
                          break;
                      case 'methodUsed':
                          result.methodUsed = Method.fromJson(data[key]);
                          break;
                      default:
                          throw new Error(`Unknown Json property ${key} given`);
                  }
              });
        return result;
    }
}

module.exports = Measurement;
