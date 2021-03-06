<?php
	session_start();
	require_once 'DBConnection.php';
	$patientId = $_SESSION['activePatientID'];
	
	$sql = 'SELECT * FROM patient_summary WHERE patient_id = :patient_id';
	
	$statement = $db->prepare($sql);
	
	$statement->bindValue(':patient_id', $patientId);
	
	$statement->execute();
	$returned = $statement->fetchAll();
	
	$array = array_values($returned);
	
	$statement->closeCursor();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <script src="../assets/js/jquery.min.js"></script>
</head>
<body id="pageBody">
<!--

    TODO: Have the tables display the data from the database.
          Use for loops for tables like medication and allergies.
          Change the design of the webpage to be consistent.
          Figure out what else the page needs to display.
          Align the text under the tables to be in the div, and also being left-aligned.
          Add banner to top of page(when its done).
          Display doctor information: their name and contact information.

-->
<!--

  All of the values here in the rows are hard coded for the moment
  until this page can get information from the database and print it out


Use jquery
-->
<h1>Patient Summary</h1>

<main>
    <button id="save">Save</button>
    <table id="summary">
        <tr>
            <th>Allergies</th>
            <th>Current problems</th>
        </tr>
        <tr>
            <td><textarea cols="50" id="allergy" rows="30"><?php include "Allergies.php"?></textarea></td>
            <td><textarea cols="50" id="problem" rows="30"><?php echo $array[0]['problems']?></textarea></td>
        </tr>
        <tr>
            <th>Medication</th>
            <th>Surgical History</th>
        </tr>
        <tr>
            <td><textarea cols="50" id="medication" rows="30"><?php echo $array[0]['medication']?></textarea></td>
            <td><textarea cols="50" id="surgical" rows="30"><?php echo $array[0]['surgical']?></textarea></td>
        </tr>
        <tr>
            <th>Activity</th>
            <th>Orders</th>
        </tr>
        <tr>
            <td><textarea cols="50" id="activity" rows="30"><?php echo $array[0]['activity']?></textarea></td>
            <td><textarea cols="50" id="orders" rows="30"><?php echo $array[0]['orders']?></textarea></td>
        </tr>
    </table>
    <div id="allergies">
        Allergies:
        <br>
        <!-- Generate tables -->
        <table>
            <tr>
                <td>Allergy</td>
                <td>Description</td>
                <td>Date</td>
            </tr>
            <tr>
                <td>Working</td>
                <td>The program does not want to work right</td>
                <td>A week ago</td>
            </tr>
        </table>
    </div>
    <div id="problems">
        Current Problems:
        <br>
        <table>
            <tr>
                <td>Problem Description</td>
                <td>Day described</td>
            </tr>
            <tr>
                <td>This table is hard-coded</td>
                <td>Today</td>
            </tr>
        </table>
    </div>
    <div id="diagnoses">
        Medical History/Diagnoses:
        <br>
        <table>
            <tr>
                <td>Diagnosis</td>
                <td>Date</td>
            </tr>
            <tr>
                <td>The table is not connected</td>
                <td>200 BC</td>
            </tr>
        </table>
    </div>
    <div id="surgery">
        Surgical history:
        <br>
        <table>
            <tr>
                <td>Surgeon</td>
                <td>Operation</td>
                <td>Date</td>
            </tr>
            <tr>
                <td>Alec</td>
                <td>This table</td>
                <td>Today</td>
            </tr>
        </table>
    </div>
    <div id="no">
        Activity Level/orders:
        <br>
        <table>
            <tr>
                <td>Activity Name</td>
                <td>Activity</td>
                <td>Orders</td>
            </tr>
            <tr>
                <td>Patient summary</td>
                <td>Working on it</td>
                <td>Get it to work</td>
            </tr>
        </table>
    </div>
</main>
<br><br><br><br>
<div class="header col-sm-12">
</div>
<script src="summary.js"></script>
<!--<script src="loadSettings.js"></script>-->
</body>
</html>
