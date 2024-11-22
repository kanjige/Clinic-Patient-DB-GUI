<?php include ('login.php'); ?>

<div style="color:#14888E; text-align:center;">

<?php

$allergies_create = "CREATE TABLE ALLERGIES (	
    ALLERGIESID CHAR(10 BYTE), 
	TYPE VARCHAR2(255 BYTE), 
	SEVERITY VARCHAR2(50 BYTE), 
	ADDITIONALCOMMENTS VARCHAR2(255 BYTE)
   );";

$appointment_info_create = "CREATE TABLE APPOINTMENT_INFORMATION(	
    APPOINTMENT_ID CHAR(10 BYTE),
	PATIENTID CHAR(16 BYTE),
	DATEOFAPPOINTMENT DATE,
	REASONFORVISIT VARCHAR2(255 BYTE),
	PHYSICIAN VARCHAR2(50 BYTE),
	DIAGNOSIS VARCHAR2(255 BYTE),
	TREATMENTPLAN VARCHAR2(255 BYTE)
   );";

$billing_history_create = "CREATE TABLE BILLING_HISTORY(	
    BILLSID CHAR(10 BYTE),
	CHARGENAME VARCHAR2(50 BYTE),
	DATEOFCHARGE DATE,
	ORIGINALCHARGE NUMBER(7,2),
	OUTSTANDINGPAYMENT NUMBER(7,2),
	PAID NUMBER(7,2)
   );";

$billing_info_create = "CREATE TABLE BILLING_INFORMATION(	
    BILLINGINFORMATIONID CHAR(10 BYTE),
    ADDRESS VARCHAR2(255 BYTE),
    CARDNUMBER CHAR(16 BYTE),
    BILLSID CHAR(10 BYTE),
    INSURANCECOVERAGEID CHAR(10 BYTE)
    );";

$emergency_contact_create = "CREATE TABLE EMERGENCY_CONTACT(	
    EMERGENCYCONTACTSID CHAR(10 BYTE), 
	FULLNAME VARCHAR2(50 BYTE), 
	PHONENUMBER NUMBER, 
	EMAIL VARCHAR2(50 BYTE), 
	SECONDARYPHONENUMBER NUMBER
   );";

$emergency_relations_create = "CREATE TABLE EMERGENCY_RELATIONS(	
    EMERGENCYCONTACTSID CHAR(10 BYTE), 
	PATIENTID CHAR(16 BYTE), 
	RELATION VARCHAR2(50 BYTE), 
	PRIORITY VARCHAR2(3 BYTE)
   );";

$immunization_info_create = "CREATE TABLE INSURANCE_INFORMATION(	
    INSURANCECOVERAGEID CHAR(10 BYTE),
	INSURANCEPROVIDER VARCHAR2(50 BYTE),
	POLICYNUMBER VARCHAR2(20 BYTE),
	COVERAGETYPE VARCHAR2(100 BYTE),
	CURRENTCOVERAGE NUMBER
   );";


$medical_history_create = "CREATE TABLE MEDICAL_HISTORY(	
    PATIENTID CHAR(16 BYTE),
	ALLERGIESID CHAR(10 BYTE),
	FAMILYHISTORY VARCHAR2(255 BYTE),
	PREVIOUSOPERATIONSID CHAR(10 BYTE),
	PRESCRIPTIONSID CHAR(10 BYTE),
	IMMUNIZATIONSID CHAR(10 BYTE),
	COMMENTS VARCHAR2(255 BYTE)
   );";

$medical_staff_create = "CREATE TABLE MEDICAL_STAFF(	
    ID CHAR(16 BYTE),
	FULLNAME VARCHAR2(50 BYTE),
	ROLE VARCHAR2(50 BYTE)
   );";

   
$patient_contact_info_create =  "CREATE TABLE PATIENT_CONTACT_INFORMATION(	
    PATIENTID CHAR(16 BYTE),
    ADDRESS VARCHAR2(255 BYTE),
    EMAIL VARCHAR2(50 BYTE),
    PHONENUMBER NUMBER
);";


$patient_info_create =  "CREATE TABLE PATIENT_INFORMATION(	
    PATIENTID CHAR(16 BYTE),
	FULLNAME VARCHAR2(50 BYTE),
	HEALTHCARDNUMBER CHAR(10 BYTE),
	SEX VARCHAR2(15 BYTE),
	GENDER VARCHAR2(25 BYTE),
	DATEOFBIRTH DATE,
	DATEOFDEATH DATE,
	BLOODTYPE VARCHAR2(5 BYTE),
	BILLINGINFORMATIONID CHAR(10 BYTE),
	EMERGENCYCONTACTSID CHAR(10 BYTE)
);";


$prescriptions_medication_create =  "CREATE TABLE PRESCRIPTIONS_AND_MEDICATION(	
    PRESCRIPTIONSID CHAR(10 BYTE),
	CURRENTLYPRESCRIBED NUMBER(1,0) DEFAULT 0,
	MEDICATIONID CHAR(8 BYTE),
	PRESCRIPTIONNAME VARCHAR2(100 BYTE),
	DOSAGE VARCHAR2(50 BYTE),
	FREQUENCY NUMBER,
	DATEPRESCRIBED DATE,
	REFILLS_REMAINING NUMBER,
	PRESCRIBINGPHYSICIAN VARCHAR2(50 BYTE)
);";

$previous_operations_create =  "CREATE TABLE PREVIOUS_OPERATIONS(	
    PREVIOUSOPERATIONSID CHAR(10 BYTE),
	OPERATIONDATE DATE,
	SURGERYTYPE VARCHAR2(50 BYTE),
	INVASIVENESS VARCHAR2(30 BYTE),
	DURATIONOFSTAY VARCHAR2(50 BYTE),
	DATEOFRELEASE DATE,
	ATTENDINGPHYSICIAN VARCHAR2(50 BYTE),
	COMPLICATIONS VARCHAR2(255 BYTE),
	NOTES VARCHAR2(255 BYTE)
);";







if (mysqli_query($conn, $allergies_create)) {
    echo "Table 'Allergies' Successfully Created.<br>";
} else {
    echo "Error Table: " . $allergies_create . "<br>" . mysqli_error($conn);
}

if (mysqli_query($conn, $appointment_info_create)) {
    echo "Table 'Appointment Information' Successfully Created.<br>";
} else {
    echo "Error Table: " . $appointment_info_create . "<br>" . mysqli_error($conn);
}

if (mysqli_query($conn, $billing_history_create)) {
    echo "Table 'Billing History' Successfully Created.<br>";
} else {
    echo "Error Table: " . $billing_history_create . "<br>" . mysqli_error($conn);
}

if (mysqli_query($conn, $billing_info_create)) {
    echo "Table 'Billing Information' Successfully Created.<br>";
} else {
    echo "Error Table: " . $billing_info_create . "<br>" . mysqli_error($conn);
}

if (mysqli_query($conn, $emergency_contact_create)) {
    echo "Table 'Emergency Contact' Successfully Created.<br>";
} else {
    echo "Error Table: " . $emergency_contact_create . "<br>" . mysqli_error($conn);
}

if (mysqli_query($conn, $emergency_relations_create)) {
    echo "Table 'Emergency Relations' Successfully Created.<br>";
} else {
    echo "Error Table: " . $emergency_relations_create . "<br>" . mysqli_error($conn);
}

if (mysqli_query($conn, $immunization_info_create)) {
    echo "Table 'Immunization Information' Successfully Created.<br>";
} else {
    echo "Error Table: " . $immunization_info_create . "<br>" . mysqli_error($conn);
}

if (mysqli_query($conn, $medical_history_create)) {
    echo "Table 'Medical History' Successfully Created.<br>";
} else {
    echo "Error Table: " . $medical_history_create . "<br>" . mysqli_error($conn);
}

if (mysqli_query($conn, $medical_staff_create)) {
    echo "Table 'Medical' Successfully Created.<br>";
} else {
    echo "Error Table: " . $medical_staff_create . "<br>" . mysqli_error($conn);
}

if (mysqli_query($conn, $patient_contact_info_create)) {
    echo "Table 'Patient Contact Information' Successfully Created.<br>";
} else {
    echo "Error Table: " . $patient_contact_info_create . "<br>" . mysqli_error($conn);
}

if (mysqli_query($conn, $prescriptions_medication_create)) {
    echo "Table 'Prescriptions and Medication' Successfully Created.<br>";
} else {
    echo "Error Table: " . $prescriptions_medication_create . "<br>" . mysqli_error($conn);
}

if (mysqli_query($conn, $previous_operations_create)) {
    echo "Table 'Previous Operations' Successfully Created.<br>";
} else {
    echo "Error Table: " . $previous_operations_create . "<br>" . mysqli_error($conn);
}




mysqli_close($conn);

?>

</div>
