<?php include ('login.php'); ?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $queryNum = $_POST['queryNum'];

    if ($queryNum) {
        $queries = [
            1 => "",
            2 => "",
            3 => "",
            4 => "",
            5 => "",
            6 => "",
            7 => "",
            8 => "",
            9 => "",
            10 => "",
            11 => "",
            12 => "",
            13 => "",
            14 => "",
            15 => "",
            16 => "",
            17 => "",
            18 => "",
        ];
    }
}

// Close connection
$conn->close();
?>