'use strict';
const Measurement = require('./Measurement');
const ModelCommon = require('./ModelCommon');
const Patient = require('./Patient');
window.$ = window.jQuery = require('jquery');
/**
 * @typedef {Object} JsonVitals
 * @property {Object} createdAt
 * @property {Object} createdBy
 * @property {string} id
 * @property {Object} patient
 * @property {Object} diastolic
 * @property {Object} systolic
 * @property {?Object} pulse
 * @property {?Object} respiration
 * @property {?Object} oxygenSaturation
 * @property {?Object} temperature
 * @property {?Object} pain
 */

/**
 * @typedef {Object} Vitals
 * @property {Measurement} diastolic
 * @property {Measurement} systolic
 * @property {?Measurement} pulse
 * @property {?Measurement} respiration
 * @property {?Measurement} oxygenSaturation
 * @property {?Measurement} temperature
 * @property {?Measurement} pain
 */
/**
 *
 */
class VitalSigns extends ModelCommon {
    /**
     *
     * @param {?Patient} patient
     */
    constructor(patient = null) {
        super();
        this.displayItems = ['systolic', 'diastolic', 'pulse', 'respiration', 'oxygenSaturation', 'temperature', 'pain'];
        /**
         *
         * @type {string}
         */
        this.idBase = '#patient-vitalSigns-';
        /**
         *
         * @type {?Vitals}
         */
        this.vitals = null;
        /**
         *
         * @type {?Patient}
         */
        this.patient = patient;
    }
    /**
     *
     * @param {JsonVitals} data
     * @param {?Patient} patient
     *
     * @return VitalSigns
     */
    static fromJson(data, patient) {
        let result = new VitalSigns(patient);
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
                      default:
                          // Only hydrate things that are going to be displayed.
                          if (0 >= result.displayItems.indexOf(key)) {
                              result.addMeasurement(key, data[key]);
                          }
                  }
              });
        return result;
    }
    /**
     *
     * @param {string} name
     * @param {Object} value
     * @returns {VitalSigns}
     */
    addMeasurement(name, value) {
        this.vitals[name] = Measurement.fromJson(value);
        return this;
    }
    displayDetails() {
        //TODO
    }
}

module.exports = VitalSigns;
