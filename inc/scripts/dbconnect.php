<?php
$servername = "eu-cdbr-azure-north-e.cloudapp.net";
$username = "baa0a9a8041f1c";
$password = "ea0c77dc";
$database = "acsm_eeffc4063160a9f";
$db = new mysqli($servername, $username, $password, $database);

if ($db->connect_error) {
    die("connection failed" . $db->connect_error);
}

?>