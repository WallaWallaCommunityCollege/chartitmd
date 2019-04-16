'use strict';
require('dotenv')
    .config();
const axios = require('axios');
const Patient = require('./Model/Patient.js');
// Config Axios defaults.
axios.defaults.baseURL = process.env.AXIOS_BASE_URL;
// Setup JQuery
window.$ = window.jQuery = require('jquery');
getPatientAsJson();

//Summary
let firstName = document.getElementById("patient-firstName").innerText;
let lastName = document.getElementById("patient-lastName").innerText;

let fullName = firstName + " " + lastName;

let bmi = Patient.getBMI(187, 65.77);
let bsa = Patient.getBSA(187, 65.77);
window.confirm("The patient's bmi is: " + bmi + "\nPatient's bsa is: " + bsa);

//Calling functions
getWeightDifference(fullName);
weightStatus(bmi, fullName);
getHeightDifference(fullName);

//Summary functions
function getHeightDifference(fullName){

    let result = 187 - 187;
    if(result > 0){
        window.confirm(fullName + " gained " + result + " centimeters.");
    }
    else if(result < 0){
        window.confirm(fullName + " lost " + result + " centimeters.");
    }
    else{
        window.confirm(fullName + " has not lost/gained centimeters.");
    }
}
function getWeightDifference(fullName){

    //let current = document.getElementById("currentWeight").innerHTML;
    //let previous = document.getElementById("weight").innerHTML;

    let result = 65.77 - 65.77;
    if(result > 0){
        window.confirm(fullName + " gained " + result + " kilograms.");
    }
    else if(result < 0){
        window.confirm(fullName + " lost " + result + " kilograms.");
    }
    else{
        window.confirm(fullName + " has not lost/gained kilograms.");
    }
}

function weightStatus(bmi, fullName){
    if(bmi < 18.5){
        window.confirm(fullName + " is underweight.");
    }
    else if(bmi >= 18.5 && bmi < 25){
        window.confirm(fullName + " is normal.");
    }
    else if(bmi >= 25 && bmi < 30){
        window.confirm(fullName + " is overweight.");
    }
    else{
        window.confirm(fullName + " is obese.");
    }
}




/**
 * Simple wrapper around an Axios call to get extended patient detail and display it.
 */
function getPatientAsJson() {
    axios.get('/patient/2Y9ovLbO93RUekOOu75TV5')
         .then(response => {
             $(document)
                 .ready(() => {
                     (
                         new Patient(response.data)
                     ).displayDetails(['recentBloodPressures', 'recentHeights', 'recentWeights']);
                 });
         })
         .catch(function (error) {
             console.log(error);
         });
}
