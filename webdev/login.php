<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 'On');
    // Create connection to Oracle
    $conn = oci_connect('username', 'password','connection');
    if (!$conn) {
        $m = oci_error();
        echo $m['message'];
    }
    else{
        echo "successfully connected with oracle database";
    }
?>
