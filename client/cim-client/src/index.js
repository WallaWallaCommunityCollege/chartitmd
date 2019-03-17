const electron = require('electron');
const path = require('path');
const url = require('url');
const axios = require('axios');

function getPatientAsJson() {
    // TODO Need to update to use env var here from dotnet for host name.
    axios.get('https://www.chartitmd.com/~dragonrun1/public/patient/2Y9ovLbO93RUekOOu75TV5')
        .then(res => {
            const patient = res.data;
            patient.age = getAge(patient.dob);
            patient.bsa = (Math.sqrt(patient.height * patient.weight) / 60).toFixed(1);
            // noinspection JSSuspiciousNameCombination
            patient.bmi = (patient.weight / Math.pow(patient.height / 100, 2)).toFixed(1);
            let order = [
                'age',
                'bmi',
                'bsa',
                'dob',
                'firstName',
                'height',
                'id',
                'lastName',
                'sex',
                'weight'
            ];
            for (let i = 0; i < order.length; i++) {
                let inp = document.getElementById('patient-' + order[i]);
                inp.setAttribute('value', patient[order[i]]);
            }
        });
}

getPatientAsJson();

function getAge(dob) {
    let dt2 = new Date().setHours(12);
    let dt1 = new Date(dob).setHours(12);
    let diff = (dt2 - dt1) / 1000;
    diff /= (60 * 60 * 24);
    return Math.abs(Math.round(diff / 365.25));

}
