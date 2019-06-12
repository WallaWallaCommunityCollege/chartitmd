# README

## Points Of Interest

So with the project now available publicly thought it was time to add
some kind of readme so people can find things easier.

### client directory

In the client directory you will find, surprisingly, the client code.
You'll find a lot of html and javascript files here.
This code requires a connection to a live host server and other things
like [Node](https://nodejs.org/en/), and
[Electron](https://electronjs.org/) installed locally to run. To see
static page(s) that was extracted from some of the more dynamically
created page(s) look in the `docs/example/` directory.

### server directories

The server side PHP code is mostly in the `src/` directory. To run the
code here you would need a basic (L,M,W)AMP server to run it.
The web server will kick everything off from the `public/` directory.
Since all the server endpoints are meant to talk to a client through a
JSON based API there not much user friendly to look at in a web browser
here. You can try some of the endpoint you find in `src/routes.php`.
To find endpoint look for lines that start with
```php
$app->get(
        '/vitalSigns/{id}',
```
or something like it. You can find out more how they work by looking at
[Slim](http://www.slimframework.com/) docs.
