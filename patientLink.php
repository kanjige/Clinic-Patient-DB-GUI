<?php
    // Copied from rubric hints
    // Error display
    error_reporting(E_ALL);
    ini_set('display_errors', 'On');

    // Create connection to Oracle
    $conn = oci_connect('rpmanoha', '04309408','(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(Host=oracle.scs.ryerson.ca)(Port=1521))(CONNEC
    T_DATA=(SID=orcl)))');

    // checking for successful connection
    if (!$conn) {
    $m = oci_error();
    echo $m['message'];
    }
    else {
    echo "successfully connected with oracle database";
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
            <h3>Create Tables</h3>
            <input type="submit" value="Create Default Tables">
            <input type="submit" value="Create New Tables">
        </section>
        <hr>

        <section>
            <h3>Drop Table</h3>
            <input type="submit" value="Drop Table">
        </section>
        <hr>

        <section>
            <h3>Add Record</h3>
            <input type="submit" value="Add Default Records">
            <input type="submit" value="Add Custom Record">
        </section>
        <hr>
        

        <section>
            <h3>Update Record</h3>
            <input type="submit" value="Update Record">
        </section>
        <hr>

        <section>
            <h3>Delete Record</h3>
            <input type="submit" value="Delete Record">
        </section>
        <hr>

        <section>
            <h3>Search Records</h3>
            <input type="submit" value="Search Records">
        </section>
        <hr>

        <section>
            <h3>Query</h3>
            <input type="submit" value="Query">
        </section>
        <hr>

    </main>



</body>
</html>
