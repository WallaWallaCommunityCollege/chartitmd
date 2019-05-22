'use strict';
require('dotenv')
    .config();
const axios = require('axios');
// Config Axios defaults.
axios.defaults.baseURL = process.env.AXIOS_BASE_URL;
const {DateTime} = require('luxon');
const User = require('./Model/User.js');
// Setup JQuery
window.$ = window.jQuery = require('jquery');
const React = require('react');
const ReactDOM = require('react-dom');
const {UsersTable, UserRow} = require('./Components/UsersTable');
/**
 * @typedef {Object} User - A user as return from the server in JSON.
 * @readonly
 * @property {Object} createdAt - Date-time user was created.
 * @readonly
 * @property {string} id - UUID64 encode id of the user.
 * @readonly
 * @property {string} name - Name of the user.
 * @property {string} password - Password (encoded) of the user.
 * @property {Object} updatedAt - Last time the password was updated
 */
/**
 *
 */
$(document)
    .ready(getAllUsers());

/**
 *
 */
function getAllUsers() {
    axios.get('/users')
         .then(response => {
             const users = response.data;
             console.log(users);
             displayUsers(users);
         });
}

/**
 *
 * @param {User[]} users
 */
function displayUsers(users) {
    let template = document.querySelector('#template-user-row');
    let tbody = document.querySelector("tbody");
    let order = ['createdAt', 'id', 'name', 'password', 'updatedAt',];
    for (let i = 0; i < users.length; i++) {
        let user = User.fromJson(users[i]);
        let clone = document.importNode(template.content, true);
        let td = clone.querySelectorAll("td");
        for (let j = 0; j < order.length; j++) {
            let column = order[j];
            switch (column) {
                case 'createdAt':
                case 'updatedAt':
                    if (null !== user[column]) {
                        td[j].textContent = user[column].toFormat('yyyy-MM-dd HH:mm:ss');
                    }
                    break;
                default:
                    td[j].textContent = user[column];
            }
        }
        tbody.appendChild(clone);
    }
}

function processForm() {
    return false;
}
