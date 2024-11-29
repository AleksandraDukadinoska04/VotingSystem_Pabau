<?php

require_once __DIR__ . "/Database/Connection.php";

$connObj = new Connection("mysql", "localhost", "pabau", 3306, "root", "");
$connObj->connectToDB();
$connection = $connObj->getConnection();
