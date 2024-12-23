<?php include ('login.php'); ?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $query = $_POST['customquery'];

    $stid = oci_parse($conn, $query);

    if (!oci_execute($stid)) {
        $error = oci_error($stid);
        echo "Error executing query: " . htmlentities($error['message'], ENT_QUOTES);
        return;
    }


    echo "<div><table border='1'>\n";


    $numCols = oci_num_fields($stid);
        echo "<tr>\n";
        for ($i = 1; $i <= $numCols; $i++) {
            $colName = oci_field_name($stid, $i);
            echo "<th>" . htmlentities($colName, ENT_QUOTES) . "</th>\n";
        }
        echo "</tr>\n";
    
    while ($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) {
        echo "<tr>\n";
        foreach ($row as $item) {
            echo "<td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
        }
        echo "</tr>\n";
    }
    echo "</table></div>\n";
}
