# Patient Request Response Example

This is a simple WIP of how a client request to the server and it's response
might look.

## Background

All client server communications will be over `https:` and will not be include
in the following urls. The server name will be abbreviated as `cim.com`.
Also in these example the additional authorization stuff will be empty.

## First Client Request

In this example we'll assume the client application needs to get a list of
patients matching some prefix of of their last name.

The server has the follow list of patients it knows about:

| patientID | patientLastName | patientFirstName | AdditionalStuff     |
|-----------|-----------------|------------------|---------------------|
| 100       | Johnson         | John             | Blah                |
| 101       | Johnson         | Ann              | Blah Blah           |
| 103       | Johns           | Harry            | Blah blah blah      |
| 104       | Jones           | Jane             | blah                |
| 105       | Doe             | Joe              | Blah Blah Blah Blah |
| 107       | Billington      | Donna            | Blah                |

The user in the client has started typing part of the patient's last name into
a patient search function and now the client is going to request a list of
patients who's last name matches in some way.

client request:

`url: cim.com/patient/find/`

and the body of the request contains the following pretty printed json data:

```json
{
    "authorization" : {},
    "lastName": "Joh"
}
```

Notice in the url the subject `patient` and action `find` used. The server
front end controller (Slim) then routes this request with:

```php
<?php
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Http\Response;
$app->post('/patient/find/', function (Request $request, Response $response) {
    // Post body parsed into PHP array from json.
    $json = $request->getParsedBody();
    $this->authorization_service->validate($json['authorization']);
    $patients = $this->patient_service->getPatients($json['lastName']);
    $response = $response->withJson($patients);
    return $response;
});
```

The response body sent to the client would have something like the following
pretty printed json:

```json
{
    "patients": [
        { "patientID": "100", "PatientLastName": "Johnson", "PatientFirstName": "John" },
        { "patientID": "101", "PatientLastName": "Johnson", "PatientFirstName": "Ann" },
        { "patientID": "103", "PatientLastName": "Johns", "PatientFirstName": "Harry" }
    ]
}
```

Client can then present the returned list to the user to choose from etc.

## Second Client Request

After the user has selected the patient in the client it now needs to start
getting the individual patient info. In this example we'll assume
patientID = 101 is needed.

client request:

`url: cim.com/patient/101`

and the body of the request contains the following pretty printed json data:

```json
{
    "authorization" : {}
}
```

Notice only the authorization info is needed in the POST body. The server
front end controller (Slim) then routes this request with:

```php
<?php
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Http\Response;
$app->post('/patient/{id}', function (Request $request, Response $response, $args) {
    // Post body parsed into PHP array from json.
    $json = $request->getParsedBody();
    $this->authorization_service->validate($json['authorization']);
    $patientID = $args['id'];
    $patient = $this->patient_service->getPatient($patientID);
    $response = $response->withJson($patient);
    return $response;
});
```

The response body sent to the client would have something like the following
pretty printed json:

```json
{
    "patient": { 
        "patientID": "101",
        "PatientLastName": "Johnson",
        "PatientFirstName": "Ann",
        "AdditionalStuff": "Blah Blah"
     }
 }
```

The client can now use the data to display it to the user etc.

## Summary

This has just been a quick couple of examples to give a general feel for how
the pieces will fit together.
