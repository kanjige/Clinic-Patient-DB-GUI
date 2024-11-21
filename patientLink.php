<?php
// error display
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Database connection settings
$username = 'rpmanoha';
$password = '04309408';
$connection_string = '(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(Host=oracle.scs.ryerson.ca)(Port=1521))(CONNECT_DATA=(SID=orcl)))';

// Establishing connection
$conn = oci_connect($username, $password, $connection_string);

// Check if the connection was successful
if (!$conn) {
    $error = oci_error();
    echo "Connection failed: " . $error['message'];
    exit;
} else {
    echo "Connection successful!";
}

// from sample sheet
$query = "Select *From test" ;
$stid = oci_parse($conn, $query);
$r = oci_execute($stid);
if($r){
 // Fetch each row in an associative array
    while ($row = oci_fetch_array($stid, OCI_RETURN_NULLS+OCI_ASSOC)) {
    foreach ($row as $item) {
    echo $item," ";
    }
    echo "<br/>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="gui.css">
    <link href="https://fonts.googleapis.com/css2?family=Assistant:wght@200..800&display=swap" rel="stylesheet">
    <meta charset="utf-8">
    <title>PatientLink</title>
</head>

<body>
    <header>
        <h1>PatientLink</h1>
    </header>
    <hr>

    <main>
       <section>
            <h3>Welcome to PatientLink</h3>
        </section>
    </main>
</body>
</html>
