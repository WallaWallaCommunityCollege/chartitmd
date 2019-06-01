'use strict';
const JsonDate = require('./JsonDate.js');
const DisplayTable = require('./DisplayTable');
window.$ = window.jQuery = require('jquery');

class Settings{
    constructor(data){
        this.data = data;
        this.displayItems = ['user_id', 'text_color', 'background_color'];
        this.idBase = '#settings-';
    }
    displayDetails(){
        new DisplayTable(this.data, this.displayItems, this.idBase);
    }
}