const {app, BrowserWindow, Menu} = require('electron');
const path = require('path');
const url = require('url');

// Keep a global reference of the window object, if you don't, the window will
// be closed automatically when the JavaScript object is garbage collected.
let win;

function createWindow() {
    let winOptions = {
        width: 1000,
        height: 700,
        useContentSize: true,
        minWidth: 960,
        minHeight: 480,
        titleText: 'ChartItMD Client',
        webPreferences: {
            allowRunningInsecureContent: false,
            webSecurity: true,
            devTools: true,
            nodeIntegration: true
        }
    };
    // Create the browser window.
    win = new BrowserWindow(winOptions);
    // and load the index.html of the app.
    win.loadURL(url.format({
        pathname: path.join(__dirname, 'src/index.html'),
        protocol: 'file:',
        slashes: true
    }));

    // Emitted when the window is closed.
    win.on('closed', () => {
        // Dereference the window object, usually you would store windows
        // in an array if your app supports multi windows, this is the time
        // when you should delete the corresponding element.
        win = null
    });
    let menu = Menu.buildFromTemplate([
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
                    label: 'Dev Tools',
                    click() {
                        win.webContents.openDevTools();
                    }
                }
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
                            pathname: path.join(__dirname, 'src/about.html'),
                            protocol: 'file:',
                            slashes: true
                        }));
                    }
                }
            ]
        }
    ]);
    Menu.setApplicationMenu(menu);
}

// This method will be called when Electron has finished
// initialization and is ready to create browser windows.
// Some APIs can only be used after this event occurs.
app.on('ready', createWindow);

// Quit when all windows are closed.
app.on('window-all-closed', () => {
    // On macOS it is common for applications and their menu bar
    // to stay active until the user quits explicitly with Cmd + Q
    if (process.platform !== 'darwin') {
        app.quit()
    }
});

app.on('activate', () => {
    // On macOS it's common to re-create a window in the app when the
    // dock icon is clicked and there are no other windows open.
    if (win === null) {
        createWindow()
    }
});

// In this file you can include the rest of your app's specific main process
// code. You can also put them in separate files and require them here.
