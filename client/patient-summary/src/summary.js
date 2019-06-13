'use strict';
const electron = require('electron');
//Path an url mess with javascript
//const path = require('path');
//const url = require('url');
const axios = require('axios');
const {DateTime} = require('luxon');
window.$ = window.jQuery = require('jquery');
//Main program
//Variables
let firstName = "Alec";
let lastName = "Aichele";
let fullName = firstName + " " + lastName;
let bsa = Math.sqrt(187 * 65.77 / 3600);
let bmi = 65.77 / Math.pow(187 / 100, 2);
//Round to two decimal places
bsa = bsa.toFixed(2);
bmi = bmi.toFixed(2);
//Print bsa and bmi
$('#bmiResult')
    .text(fullName + "'s bmi is now " + bmi);
$('#bsaResult')
    .text(fullName + "'s bsa is now " + bsa);
// document.getElementById("bmiResult").innerHTML = fullName + "'s bmi is now " + bmi;
// document.getElementById("bsaResult").innerHTML = fullName + "'s bsa is now " + bsa;
//Call functions
getWeightDifference();
getHeightDifference();
weightStatus(bmi, fullName);
//Functions
//Functions for Appointment comparisons
function getHeightDifference() {
    let result = 187 - 187;
    let output = '';
    if (result > 0) {
        output = fullName + " gained " + result + " centimeters.";
        // document.getElementById("heightResult").innerHTML = fullName + " gained " + result + " centimeters.";
    } else if (result < 0) {
        output = fullName + " lost " + result + " centimeters.";
        // document.getElementById("heightResult").innerHTML = fullName + " lost " + result + " centimeters.";
    } else {
        output = fullName + " has not lost/gained centimeters.";
        // document.getElementById("heightResult").innerHTML = fullName + " has not lost/gained centimeters.";
    }
    $('#heightResult')
        .text(output);
}
function getWeightDifference() {
    //let current = document.getElementById("currentWeight").innerHTML;
    //let previous = document.getElementById("weight").innerHTML;
    let result = 65.77 - 65.77;
    let output = '';
    if (result > 0) {
        output = fullName + " gained " + result + " kilograms.";
        // document.getElementById("weightResult").innerHTML = fullName + " gained " + result + " kilograms.";
    } else if (result < 0) {
        output = fullName + " lost " + result + " kilograms.";
        // document.getElementById("weightResult").innerHTML = fullName + " lost " + result + " kilograms.";
    } else {
        output = fullName + " has not lost/gained kilograms.";
        // document.getElementById("weightResult").innerHTML = fullName + " has not lost/gained kilograms.";
    }
    $('#weightResult')
        .text(output);
}
function weightStatus(bmi, fullName) {
    let output = '';
    if (bmi < 18.5) {
        output = fullName + " is underweight.";
        // document.getElementById("bmiStatus").innerHTML = fullName + " is underweight.";
    } else if (bmi >= 18.5 && bmi < 25) {
        output = fullName + " is normal.";
        // document.getElementById("bmiStatus").innerHTML = fullName + " is normal.";
    } else if (bmi >= 25 && bmi < 30) {
        output = fullName + " is overweight.";
        // document.getElementById("bmiStatus").innerHTML = fullName + " is overweight.";
    } else {
        output = fullName + " is obese.";
        // document.getElementById("bmiStatus").innerHTML = fullName + " is obese.";
    }
    $('#bmiStatus')
        .text(output);
}
//Functions for other stuff
