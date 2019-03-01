<?php
$var = filter_input(INPUT_POST, 'search', FILTER_SANATIZE_SPECIAL_CHARS);
$query = 'SELECT patient_id, patient_firstname, patient_lastname FROM patients
	WHERE patient_id LIKE :search% OR patient_firstname LIKE :search% OR patient_lastname LIKE :search%';

$statement = $db->prepare($query);
$statement->bindValue(':search', $var);
$statement->execute();
$patients = $statement->fetchAll();
$statement->closeCursor();
//if no results show, return
if ($statement->rowCount() == 0) {
    $error = 'No results were found';//Optional
    include();
    exit();
} else {
    //run a loop to print data
    //Foreach loop will be in html
    foreach ($patients as $patient) {
        echo $patient['patient_id'] . ': ' . $patient['patient_firstname'] . ', ' . $patient['patient_lastname'];
    }
}
?>