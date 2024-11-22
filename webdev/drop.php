<?php include ('login.php'); ?>

<br>
<h3 style="text-align: center; color: black max-width: 70%; margin: auto;">log:</h3>
<br>

<div style="border-style: solid; border-width: 1px; border-color: black; overflow: auto; padding: 10px; font-size: 12px;">


<?php

$drop = [
    "DROP TABLE ALLERGIES CASCADE CONSTRAINTS",
    "DROP TABLE APPOINTMENT_INFORMATION CASCADE CONSTRAINTS",
    "DROP TABLE BILLING_HISTORY CASCADE CONSTRAINTS",
    "DROP TABLE BILLING_INFORMATION CASCADE CONSTRAINTS",
    "DROP TABLE EMERGENCY_CONTACT CASCADE CONSTRAINTS",
    "DROP TABLE EMERGENCY_RELATIONS CASCADE CONSTRAINTS",
    "DROP TABLE IMMUNIZATION_INFORMATION CASCADE CONSTRAINTS",
    "DROP TABLE INSURANCE_INFORMATION CASCADE CONSTRAINTS",
    "DROP TABLE MEDICAL_HISTORY CASCADE CONSTRAINTS",
    "DROP TABLE MEDICAL_STAFF CASCADE CONSTRAINTS",
    "DROP TABLE PATIENT_CONTACT_INFORMATION CASCADE CONSTRAINTS",
    "DROP TABLE PATIENT_INFORMATION CASCADE CONSTRAINTS",
    "DROP TABLE PRESCRIPTIONS_AND_MEDICATION CASCADE CONSTRAINTS",
    "DROP TABLE PREVIOUS_OPERATIONS CASCADE CONSTRAINTS",
];

foreach ($drop as $query) {
    $stid = oci_parse($conn, $query);
    if (oci_execute($stid)) {
        echo "<div>Table dropped: " . explode(' ', $query)[2] . "</div>";
    } else {
        $error = oci_error($stid);
        echo "<div style='color: #630000;'>Error dropping table: " . $error['message'] . "</div>";
    }
}

oci_close($conn);

?>

</div>
