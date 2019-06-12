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
        this.showItems = {
            must: ['systolic', 'diastolic', 'pulse'],
            may: ['respiration', 'oxygenSaturation', 'temperature'],
            dont: ['pain', 'createdBy', 'createdAt', 'id', 'patient'],
        };
        /**
         *
         * @type {string}
         */
        this.idPrefix = 'patient-vitalSigns';
        /**
         *
         * @type {?Vitals}
         */
        this.vitals = {};
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
                              result[key] = Patient.fromJson(data[key]);
                          }
                          break;
                      default:
                          // Only hydrate things that might be displayed.
                          if (0 >= result.showItems['must'].indexOf(key) || 0
                              >= result.showItems['may'].indexOf(key) || 0
                              >= result.showItems['dont'].indexOf(key)) {
                              try {
                                  result.vitals[key] = Measurement.fromJson(data[key]);
                              } catch (error) {
                                  console.log(error);
                              }
                          } else {
                              throw new Error(`Unknown Json property ${key} given`);
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
        this.vitals[name] = Measurement.fromJson(value, this.patient);
        return this;
    }
    /**
     *
     */
    displayDetails() {
        let card = $(`#${this.idPrefix}-card`);
        let name = 'vitalSigns';
        let collapseId = `${this.idPrefix}-card-collapse`;
        let mustShow = $('<div></div>')
            .attr({
                      'class': 'card-group', 'id': `${this.idPrefix}-card-must-show`
                  });
        for (let i = 0; i < this.showItems['must'].length; i++) {
            let columnName = this.showItems['must'][i];
            if (this.vitals.hasOwnProperty(columnName)) {
                /**
                 * @type {Measurement}
                 */
                let vital = this.vitals[columnName];
                mustShow.append(vital.asBSCard(this.idPrefix, columnName));
            }
        }
        // noinspection CheckTagEmptyBody
        let showMore = $('<button></button>')
            .attr({
                      'aria-controls': collapseId,
                      'aria-expanded': 'false',
                      'aria-pressed': 'false',
                      'class': 'active nav-link font-weight-bold btn-sm btn-outline-secondary rounded mt-2 mb-2',
                      'data-target': `#${collapseId}`,
                      'data-toggle': 'collapse',
                      'id': `${this.idPrefix}-card-show-more`,
                      'type': 'button',
                  })
            .text('...');
        let collapse = $('<div></div>')
            .attr({
                      'class': 'collapse',
                      'data-parent': `#${this.idPrefix}-card`,
                      'id': collapseId,
                  });
        // noinspection CheckTagEmptyBody
        let mayShow = $('<div></div>')
            .attr({
                      'class': 'card-group', 'id': `${this.idPrefix}-card-may-show`
                  });
        for (let i = 0; i < this.showItems['may'].length; i++) {
            let columnName = this.showItems['may'][i];
            if (this.vitals.hasOwnProperty(columnName)) {
                /**
                 * @type {Measurement}
                 */
                let vital = this.vitals[columnName];
                mayShow.append(vital.asBSCard(this.idPrefix, columnName));
            }
        }
        // noinspection CheckTagEmptyBody
        let dontShow = $('<section></section>')
            .attr({
                      'id': `${this.idPrefix}-card-dont-show`
                  });
        for (let i = 0; i < this.showItems['dont'].length; i++) {
            let columnName = this.showItems['dont'][i];
            if (columnName in this.vitals) {
                /**
                 * @type {Measurement}
                 */
                let vital = this.vitals[columnName];
                dontShow.append(vital.asBSCard(this.idPrefix, columnName));
            }
        }
        collapse.append(mayShow, dontShow);
        let cardBody = $('<div class="card-body"></div>')
            .append(mustShow, showMore, collapse);
        card.append(cardBody);
    }
}

module.exports = VitalSigns;
