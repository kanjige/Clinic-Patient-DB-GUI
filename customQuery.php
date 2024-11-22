<?php include('login.php'); ?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $customQuery = $_POST['customQuery'];

        if (!$customQuery) {
                echo "<h4>No Query Provided</h4>";
                return;
        }
}

// Close the Oracle connection
oci_close($conn);
?>