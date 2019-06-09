'use strict';
const JsonDate = require('./JsonDate.js');
const DisplayTable = require('./DisplayTable');
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
         * @type {?string}
         */
        this.lastName = null;
        /**
         *
         * @type {?DateTime};
         */
        this.updatedAt = null;
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
        return (weight / Math.pow(height / 100, 2)).toFixed(1);
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
        return (Math.sqrt(height * weight) / 60).toFixed(1);
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
    displayDetails() {
        console.log(this);
        // (new DisplayTable(this.data['patient'], 'patient-')).displayTable();
        this.displayGeneralDetails();
    }
    /**
     *
     */
    displayGeneralDetails() {
        let dob = this.dateOfBirth;
        // let dob = DateTime.fromSQL(patient['dateOfBirth']['date']);
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
