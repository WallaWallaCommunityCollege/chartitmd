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
        this.showItems = {
            must: ['measurement'],
            may: ['createdAt', 'createdBy', 'location', 'methodUsed'],
            dont: ['id', 'patient'],
        };
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
                  console.log('Measurement key: ' + key);
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
    static getTitleCase(name) {
        return name.replace(/([a-z0-9])([A-Z])/g, '$1 $2')
                   .toLowerCase()
                   .split(' ')
                   .map(function (word) {
                       return (
                           word.charAt(0)
                               .toUpperCase() + word.slice(1)
                       );
                   })
                   .join(' ');
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
            .append($('<h5></h5>')
                        .attr('class', 'card-title')
                        .text(Measurement.getTitleCase(name)), cardBody);
        return card;
    }
    buildDontColumnLabel(mode, idPrefix, name, columnName) {
        let {firstSpan, inner} = this.buildLabelInner(columnName, mode, idPrefix, name);
        // noinspection CheckTagEmptyBody
        return $('<label class="w-50"></label>')
            .append(firstSpan, inner);
    }
    buildLabelInner(columnName, mode, idPrefix, name) {
        // noinspection CheckTagEmptyBody
        let firstSpan = $('<span></span>')
            .text(Measurement.getTitleCase(columnName));
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
                        break;
                    case 'object':
                        // TODO: Should check if object actually has name property etc.
                        // Would be better to do stuff directly in some way in each object.
                        if ('createdAt' === columnName) {
                            inner.text(this[columnName].toFormat('yyyy-MM-dd'));
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
        }
        inner.attr('id', `${idPrefix}-${name}-${columnName}`);
        // TODO: Should have code here to add unit of measurement span tag if needed.
        return {firstSpan, inner};
    }
    buildMayColumnLabel(mode, idPrefix, name, columnName) {
        let {firstSpan, inner} = this.buildLabelInner(columnName, mode, idPrefix, name);
        // noinspection CheckTagEmptyBody
        return $('<label class="w-100"></label>')
            .append(firstSpan, inner);
    }
    buildMustColumnLabel(mode, idPrefix, name, columnName) {
        let {firstSpan, inner} = this.buildLabelInner(columnName, mode, idPrefix, name);
        // noinspection CheckTagEmptyBody
        return $('<label></label>')
            .append(firstSpan, inner);
    }
}

module.exports = Measurement;
