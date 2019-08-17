<?php
$servername = "doclearn_postgres";
$username = "postgres";
$password = "postgres";

//pg_connect ("host=$servername dbname=test user=$username password=$password")

if (!$connection = pg_connect ("host=$servername user=$username password=$password")) {
    $error = error_get_last();
    echo "Connection failed. Error was: ". $error['message']. "\n";
} else {
    echo "Connection succesful.\n";
}
