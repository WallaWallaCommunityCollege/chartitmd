const {BrowserWindow, Menu} = require('electron');
const {app, win} = require('./main');

const appMenu = [
    {
        label: 'File',
        submenu: [
            {
                label: 'Exit',
                click() {
                    app.quit();
                }
            },
        ]
    },
    {
        label: 'View',
        submenu: [
            {
                label: 'Reload',
                accelerator: 'CmdOrCtrl+R',
                click(item, focusedWindow) {
                    if (focusedWindow) {
                        focusedWindow.reload();
                    }
                }
            },
            {
                label: 'Toggle Developer Tools',
                accelerator: process.platform === 'darwin' ? 'Alt+Command+I' : 'Ctrl+Shift+I',
                click() {
                    win.webContents.toggleDevTools();
                }
            },
            {
                label: 'Reset Main Window Size',
                accelerator: 'Alt+R',
                click() {
                    win.setSize(1000, 700);
                    win.center();
                }
            },
        ]
    },
    {
        label: 'Help',
        submenu: [
            {
                label: 'About',
                click() {
                    let aboutOptions = {
                        height: 480,
                        minHeight: 480,
                        minWidth: 960,
                        parent: win,
                        useContentSize: true,
                        width: 640,
                        webPreferences: {
                            allowRunningInsecureContent: false,
                            webSecurity: true,
                            devTools: true,
                            nodeIntegration: true
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
let menu = Menu.buildFromTemplate(appMenu);
Menu.setApplicationMenu(menu);
