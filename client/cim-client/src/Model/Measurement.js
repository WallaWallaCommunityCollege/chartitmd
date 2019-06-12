'use strict';
const ModelCommon = require('./ModelCommon');
const Location = require('./Location');
const Method = require('./Method');
const Patient = require('./Patient');
const UnitOfMeasurement = require('./UnitOfMeasurement');
const MeasurementRange = require('./MeasurementRange');
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
                  if (null == data[key]) {
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
                      case 'location':
                          result[key] = Location.fromJson(data[key]);
                          break;
                      case 'measuredIn':
                          result[key] = UnitOfMeasurement.fromJson(data[key]);
                          break;
                      case 'measurement':
                          result[key] = data[key];
                          break;
                      case 'methodUsed':
                          result[key] = Method.fromJson(data[key]);
                          break;
                      default:
                          throw new Error(`Unknown Json property ${key} given`);
                  }
              });
        return result;
    }
    /**
     *
     * @param {string} idPrefix Prefix for element ids.
     * @param {string} name Measurement name ie: Systolic, Diastolic, Pain, etc.
     * @param {?string} mode One of add or read.
     */
    asBSCard(idPrefix, name, mode = 'read') {
        // noinspection CheckTagEmptyBody
        let mustShow = $('<button></button>')
            .attr({
                      'aria-expanded': 'false',
                      'aria-haspopup': 'true',
                      'class': 'nav-link dropdown-toggle',
                      'data-target': `${name}-card-may-show`,
                      'data-toggle': 'dropdown',
                      'id': `${idPrefix}-${name}-card-must-show`,
                      'type': 'button'
                  });
        for (let i = 0; i < this.showItems['must'].length; i++) {
            let columnName = this.showItems['must'][i];
            mustShow.append(this.buildMustColumnLabel(mode, idPrefix, name, columnName));
        }
        // noinspection CheckTagEmptyBody
        let mayShow = $('<section></section>')
            .attr({
                      'aria-labelledby': `${idPrefix}-${name}-card-must-show`,
                      'class': `dropdown-menu ${name}-card-may-show`,
                      'id': `${idPrefix}-${name}-card-may-show`
                  });
        for (let i = 0; i < this.showItems['may'].length; i++) {
            let columnName = this.showItems['may'][i];
            mayShow.append(this.buildMayColumnLabel(mode, idPrefix, name, columnName));
        }
        // noinspection CheckTagEmptyBody
        let dontShow = $('<section></section>')
            .attr({
                      'id': `${idPrefix}-${name}-card-dont-show`
                  });
        for (let i = 0; i < this.showItems['dont'].length; i++) {
            let columnName = this.showItems['dont'][i];
            dontShow.append(this.buildDontColumnLabel(mode, idPrefix, name, columnName));
        }
        let cardBody = $('<div class="card-body dropdown"></div>')
            .append(mustShow, mayShow, dontShow);
        // noinspection CheckTagEmptyBody,UnnecessaryLocalVariableJS
        let card = $('<div></div>')
            .attr({
                      'class': 'card', 'id': `${idPrefix}-${name}-card`,
                  })
            .append(cardBody);
        // .append($('<h5></h5>')
        //             .attr('class', 'card-title ml-1')
        //             .text(Measurement.getTitleCase(name)), cardBody);
        return card;
    }
    buildDontColumnLabel(mode, idPrefix, name, columnName) {
        let inside = this.buildLabelInner(columnName, mode, idPrefix, name);
        // noinspection CheckTagEmptyBody
        return $('<label class="w-50"></label>')
            .append(...inside);
    }
    buildLabelInner(columnName, mode, idPrefix, name) {
        let result = [];
        // noinspection CheckTagEmptyBody
        let firstSpan = $('<span></span>')
            .text(Measurement.getTitleCase(columnName) + ':');
        result.push(firstSpan);
        let inner;
        if ('read' === mode) {
            // noinspection CheckTagEmptyBody
            inner = $('<output></output>');
            if (null === this[columnName]) {
                inner.text('** Unknown **');
            } else {
                switch (typeof this[columnName]) {
                    case 'function':
                        inner.text(this[columnName]());
                        break;
                    case 'number':
                    case 'string':
                        inner.text(this[columnName]);
                        if ('measurement' === columnName) {
                            firstSpan.text(Measurement.getTitleCase(name) + ':');
                        }
                        if ('measurement' === columnName && null != this.measuredIn && null
                            != this.measuredIn.measurementRange) {
                            /**
                             *
                             * @type {?MeasurementRange} mr
                             */
                            let mr = this.measuredIn.measurementRange;
                            if (this[columnName] < mr.sigmaMinus2) {
                                inner.addClass('bg-danger text-white');
                                inner.attr('title', 'Very low');
                            } else if (this[columnName] < mr.sigmaMinus1) {
                                inner.addClass('bg-warning text-white');
                                inner.attr('title', 'Low');
                            } else if (this[columnName] > mr.sigmaPlus2) {
                                inner.addClass('bg-danger text-white');
                                inner.attr('title', 'Very high');
                            } else if (this[columnName] > mr.sigmaPlus1) {
                                inner.addClass('bg-warning text-white');
                                inner.attr('title', 'High');
                            } else {
                                inner.attr('title', 'Normal');
                            }
                        }
                        break;
                    case 'object':
                        // TODO: Should check if object actually has name property etc.
                        // Would be better to do stuff directly in some way in each object.
                        if ('createdAt' === columnName) {
                            inner.text(this[columnName].toFormat('yyyy-MM-dd HH:mm:ss'));
                        } else {
                            inner.text(this[columnName].name);
                        }
                        break;
                    default:
                        inner.text('** Unknown value type **');
                }
            }
        } else {
            inner = $('<input>');
            // TODO: Add attributes for type, allowed ranges, etc.
        }
        inner.attr('id', `${idPrefix}-${name}-${columnName}`);
        result.push(inner);
        if ('measurement' === columnName && null != this.measuredIn) {
            // noinspection CheckTagEmptyBody
            let lastSpan = $('<span></span>')
                .text(this.measuredIn.symbol);
            if (null == this.measuredIn.description || '' === this.measuredIn.description) {
                lastSpan.attr('title', this.measuredIn.name);
            } else {
                lastSpan.attr('title', this.measuredIn.description);
            }
            result.push(lastSpan);
        }
        return result;
    }
    buildMayColumnLabel(mode, idPrefix, name, columnName) {
        let inside = this.buildLabelInner(columnName, mode, idPrefix, name);
        // noinspection CheckTagEmptyBody
        return $('<label class="w-100"></label>')
            .append(...inside);
    }
    buildMustColumnLabel(mode, idPrefix, name, columnName) {
        let inside = this.buildLabelInner(columnName, mode, idPrefix, name);
        // noinspection CheckTagEmptyBody
        return $('<label></label>')
            .append(...inside);
    }
}

module.exports = Measurement;
