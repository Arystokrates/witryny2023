<?php
$DB_SERVER = 'localhost';
$DB_USER = 'root';
$DB_PASSWORD = '';
$DB_NAME = "ważniak";
$mysqliCon = @mysqli_connect($DB_SERVER, $DB_USER, $DB_PASSWORD, $DB_NAME);

if (!$mysqliCon) {
    die ("There is nothing we can do: ". mysqli_connect_errno());
}