<?php include('login.php'); ?>

<style>
        table {
                border: 1px solid;
                border-collapse: collapse;
                text-align: center;
                margin-left: auto;
                margin-right: auto;
        }

        td,
        th {
                padding: 15px;
                border: 1px solid;
        }

        tr:nth-child(even) {
                background-color: #f2f2f2;
        }

        th {
                background-color: #8d1fc0;
                color: white;
        }
</style>

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