'use strict';
const JsonDate = require('./JsonDate.js');
const Gender = require('./Gender');
const ModelCommon = require('./ModelCommon');
window.$ = window.jQuery = require('jquery');

/**
 *
 */
class Patient extends ModelCommon {
    /**
     *
     */
    constructor() {
        super();
        /**
         *
         * @type {?DateTime};
         */
        this.dateOfBirth = null;
        /**
         *
         * @type {?string}
         */
        this.firstName = null;
        /**
         *
         * @type {?Gender}
         */
        this.gender = null;
        /**
         *
         * @type {string}
         */
        this.idPrefix = 'patient';
        /**
         *
         * @type {?string}
         */
        this.lastName = null;
        this.showItems = {
            must: ['firstName', 'lastName', 'dateOfBirth', 'gender'],
            may: ['createdAt', 'createdBy'],
            dont: ['id', 'updatedAt'],
        };
        /**
         *
         * @type {?DateTime};
         */
        this.updatedAt = null;
    }
    /**
     *
     * @param {Object} data
     * @property {Object} createdAt
     * @property {Object} createdBy
     * @property {string} id
     * @property {Object} dateOfBirth
     * @property {string} firstName
     * @property {?Object} gender
     * @property {string} lastName
     * @property {?Object} updatedAt
     *
     * @return Patient
     */
    static fromJson(data) {
        let result = new Patient();
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
                      case 'dateOfBirth':
                          result.dateOfBirth = JsonDate.fromJsonPHPDate(data[key]);
                          break;
                      case 'firstName':
                          result.firstName = data[key];
                          break;
                      case 'gender':
                          result.gender = Gender.fromJson(data[key]);
                          break;
                      case 'lastName':
                          result.lastName = data[key];
                          break;
                      case 'updatedAt':
                          break;
                      default:
                          throw new Error(`Unknown Json property ${key} given`);
                  }
              });
        return result;
    }
    /**
     * Calculates Body Mass Index (BMI) from height and weight.
     *
     * @param {number} height Height in centimeters (cm)
     * @param {number} weight weight in Kilograms (kg)
     *
     * @returns {string}
     */
    static getBMI(height, weight) {
        return (
            weight / Math.pow(height / 100, 2)
        ).toFixed(1);
    }
    /**
     * Calculates Body Surface Area (BSA) from height and weight.
     *
     * @param {number} height Height in centimeters (cm)
     * @param {number} weight weight in Kilograms (kg)
     *
     * @returns {string}
     */
    static getBSA(height, weight) {
        return (
            Math.sqrt(height * weight) / 60
        ).toFixed(1);
    }
    /**
     *
     * @param {?string} mode One of add or read.
     */
    asBSCard(mode = 'read') {
        let name = this.idPrefix;
        // noinspection CheckTagEmptyBody
        let mustShow = $('<button></button>')
            .attr({
                      'aria-expanded': 'false',
                      'aria-haspopup': 'true',
                      'class': 'nav-link dropdown-toggle',
                      'data-target': `${name}-card-may-show`,
                      'data-toggle': 'dropdown',
                      'id': `${name}-card-must-show`,
                      'type': 'button'
                  });
        for (let i = 0; i < this.showItems['must'].length; i++) {
            let columnName = this.showItems['must'][i];
            mustShow.append(this.buildMustColumnLabel(mode, name, columnName));
        }
        // noinspection CheckTagEmptyBody
        let mayShow = $('<section></section>')
            .attr({
                      'aria-labelledby': `${name}-card-may-show`,
                      'class': `dropdown-menu ${name}-card-may-show`,
                      'id': `${name}-card-may-show`
                  });
        for (let i = 0; i < this.showItems['may'].length; i++) {
            let columnName = this.showItems['may'][i];
            mayShow.append(this.buildMayColumnLabel(mode, name, columnName));
        }
        // noinspection CheckTagEmptyBody
        let dontShow = $('<section></section>')
            .attr({
                      'id': `${name}-card-dont-show`
                  });
        for (let i = 0; i < this.showItems['dont'].length; i++) {
            let columnName = this.showItems['dont'][i];
            dontShow.append(this.buildDontColumnLabel(mode, name, columnName));
        }
        let cardBody = $('<div class="card-body dropdown"></div>')
            .append(mustShow, mayShow, dontShow);
        // noinspection CheckTagEmptyBody,UnnecessaryLocalVariableJS
        let card = $('<div></div>')
            .attr({
                      'class': 'card mb-3 shadow', 'id': `${name}-card`,
                  })
            .append($('<h5></h5>')
                        .attr('class', 'card-title ml-1')
                        .text(Patient.getTitleCase(name)), cardBody);
        card.prependTo('main');
    }
    buildDontColumnLabel(mode, name, columnName) {
        let inside = this.buildLabelInner(columnName, mode, name);
        // noinspection CheckTagEmptyBody
        return $('<label class="w-50"></label>')
            .append(...inside);
    }
    buildLabelInner(columnName, mode, name) {
        let result = [];
        // noinspection CheckTagEmptyBody
        let firstSpan = $('<span></span>')
            .text(Patient.getTitleCase(columnName) + ':');
        result.push(firstSpan);
        let inner;
        if ('read' === mode) {
            // noinspection CheckTagEmptyBody
            inner = $('<output></output>');
            if (null == this[columnName]) {
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
                            inner.text(this[columnName].toFormat('yyyy-MM-dd HH:mm:ss'));
                        } else if ('dateOfBirth' === columnName) {
                            inner.text(this[columnName].toFormat('yyyy-MM-dd'));
                        } else if ('gender' === columnName) {
                            inner.attr('title', 'Assigned sex at birth');
                            inner.text(this[columnName].assignedSex);
                            firstSpan.text('Assigned Sex:');
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
        inner.attr('id', `${name}-${columnName}`);
        result.push(inner);
        // TODO: Should have code here to add unit of measurement span tag if needed.
        return result;
    }
    buildMayColumnLabel(mode, name, columnName) {
        let inside = this.buildLabelInner(columnName, mode, name);
        // noinspection CheckTagEmptyBody
        return $('<label class="w-100"></label>')
            .append(...inside);
    }
    buildMustColumnLabel(mode, name, columnName) {
        let inside = this.buildLabelInner(columnName, mode, name);
        // noinspection CheckTagEmptyBody
        return $('<label class="mr-1"></label>')
            .append(...inside);
    }
    displayDetails() {
        this.displayGeneralDetails();
    }
    /**
     *
     */
    displayGeneralDetails() {
        let dob = this.dateOfBirth;
        let age = Math.floor(Math.abs(dob.diffNow('year')
                                         .as('year')));
        $('#patient-age')
            .text(age);
        $('#patient-assignedSex')
            .val(this.gender.assignedSex);
        let createdAt = this.createdAt;
        $('#patient-createdAt')
            .val(createdAt.toFormat('yyyy-MM-dd'));
        $('#patient-dateOfBirth')
            .val(dob.toFormat('yyyy-MM-dd'));
        $('#patient-firstName')
            .val(this.firstName);
        $('#patient-id')
            .val(this.id);
        $('#patient-lastName')
            .val(this.lastName);
        if (null === this.updatedAt) {
            $('#patient-updatedAt')
                .hide();
        } else {
            let updatedAt = this.updatedAt;
            // let updatedAt = DateTime.fromSQL(patient['updatedAt']['date']);
            $('#patient-updatedAt')
                .val(updatedAt.toFormat('yyyy-MM-dd'));
        }
    }
}

module.exports = Patient;
