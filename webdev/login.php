<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 'On');
    // Create connection to Oracle
    $conn = oci_connect('rpmanoha', '04309408','(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(Host=oracle.scs.ryerson.ca)(Port=1521))(CONNECT_DATA=(SID=orcl)))');
    if (!$conn) {
        $m = oci_error();
        echo $m['message'];
    }
    else{
        echo "successfully connected with oracle database";
    }
?>
