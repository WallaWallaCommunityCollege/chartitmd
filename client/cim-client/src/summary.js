'use strict';

//https://www.w3schools.com/howto/howto_html_include.asp

const electron = require('electron');
//Path and url mess with javascript
//const path = require('path');
//const url = require('url');
const axios = require('axios');
const {DateTime} = require('luxon');



//Main program
//Variables
let firstName = "Alec";
let lastName = "Aichele";
let fullName = firstName + " " + lastName;
let bsa = Math.sqrt(187 * 65.77 / 3600);
let bmi = 65.77/Math.pow(187/100, 2);

//Round to two decimal places
bsa = bsa.toFixed(2);
bmi = bmi.toFixed(2);

//Print bsa and bmi
document.getElementById("bmiResult").innerHTML = fullName + "'s bmi is now " + bmi;
document.getElementById("bsaResult").innerHTML = fullName + "'s bsa is now " + bsa;






//Call functions
getWeightDifference();
getHeightDifference();
weightStatus(bmi, fullName);

includeHTML();

//Functions
function test(){
    window.confirm("Passed the test");
}
//Functions for Appointment comparisons
function getHeightDifference(){

    let result = 187 - 187;
    if(result > 0){
        document.getElementById("heightResult").innerHTML = fullName + " gained " + result + " centimeters.";
    }
    else if(result < 0){
        document.getElementById("heightResult").innerHTML = fullName + " lost " + result + " centimeters.";
    }
    else{
        document.getElementById("heightResult").innerHTML = fullName + " has not lost/gained centimeters.";
    }
}

function getWeightDifference(){

    //let current = document.getElementById("currentWeight").innerHTML;
    //let previous = document.getElementById("weight").innerHTML;

    let result = 65.77 - 65.77;
    if(result > 0){
        document.getElementById("weightResult").innerHTML = fullName + " gained " + result + " kilograms.";
    }
    else if(result < 0){
        document.getElementById("weightResult").innerHTML = fullName + " lost " + result + " kilograms.";
    }
    else{
        document.getElementById("weightResult").innerHTML = fullName + " has not lost/gained kilograms.";
    }
}

function weightStatus(bmi, fullName){
    if(bmi < 18.5){
        document.getElementById("bmiStatus").innerHTML = fullName + " is underweight.";
    }
    else if(bmi >= 18.5 && bmi < 25){
        document.getElementById("bmiStatus").innerHTML = fullName + " is normal.";
    }
    else if(bmi >= 25 && bmi < 30){
        document.getElementById("bmiStatus").innerHTML = fullName + " is overweight.";
    }
    else{
        document.getElementById("bmiStatus").innerHTML = fullName + " is obese.";
    }
}

//Functions for other stuff
function includeHTML() {
    let z, i, elmnt, file, xhttp;
    /* Loop through a collection of all HTML elements: */
    z = document.getElementsByTagName("*");
    for (i = 0; i < z.length; i++) {
        elmnt = z[i];
        /*search for elements with a certain atrribute:*/
        file = elmnt.getAttribute("w3-include-html");
        if (file) {
            /* Make an HTTP request using the attribute value as the file name: */
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4) {
                    if (this.status == 200) {elmnt.innerHTML = this.responseText;}
                    if (this.status == 404) {elmnt.innerHTML = "Page not found.";}
                    /* Remove the attribute, and call this function once more: */
                    elmnt.removeAttribute("w3-include-html");
                    includeHTML();
                }
            }
            xhttp.open("GET", file, true);
            xhttp.send();
            /* Exit the function: */
            return;
        }
    }
}