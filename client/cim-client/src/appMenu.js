const {BrowserWindow, Menu} = require('electron');
const {win} = require('./main');
const path = require('path');
const url = require('url');
const appMenu = [
    {
        role: 'windowMenu',
    }, {
        role: "editMenu"
    }, {
        label: 'View', submenu: [
            {
                role: 'reload'
            },
            {
                role: 'forceReload'
            }, {
                type: 'separator'
            }, {
                role: 'resetzoom'
            },
            {
                role: 'zoomin', accelerator: 'Ctrl+='
            },
            {
                role: 'zoomout'
            },
            {
                type: 'separator'
            }, {
                label: 'Reset Main Window Size', accelerator: 'Alt+R', click() {
                    win.setSize(1000, 700);
                    win.center();
                }
            }, {
                role: 'togglefullscreen'
            }, {
                role: 'toggleDevTools'
            }
        ]
    },
    {
        label: 'Patient', submenu: [
            {
                label: 'Home', click() {
                    win.loadURL(url.format({
                                               pathname: path.join(__dirname, 'patient.html'),
                                               protocol: 'file:',
                                               slashes: true
                                           }));
                }
            }, {type: 'separator'}, {
                label: 'Vital Signs', click() {
                    win.loadURL(url.format({
                                               pathname: path.join(__dirname, 'vitalSigns.html'),
                                               protocol: 'file:',
                                               slashes: true
                                           }));
                }
            }
        ],
    }, {
        label: 'Admin',
        submenu: [
            {
                label: 'Browse Users',
                click() {
                    win.loadURL(url.format({
                                               pathname: path.join(__dirname, 'users.html'),
                                               protocol: 'file:',
                                               slashes: true
                                           }));
                }
            },
        ]
    }, {
        label: 'Help', submenu: [
            {
                label: 'About', click() {
                    let aboutOptions = {
                        height: 480,
                        minHeight: 480,
                        minWidth: 960,
                        parent: win,
                        useContentSize: true,
                        width: 640,
                        webPreferences: {
                            allowRunningInsecureContent: false, webSecurity: true, devTools: true, nodeIntegration: true
                        }
                    };
                    let about = new BrowserWindow(aboutOptions);
                    about.loadURL(url.format({
                                                 pathname: path.join(__dirname, 'about.html'),
                                                 protocol: 'file:',
                                                 slashes: true
                                             }));
                }
            }
        ]
    }
];
const menu = Menu.buildFromTemplate(appMenu);
Menu.setApplicationMenu(menu);
