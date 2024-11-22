<?php include ('login.php'); ?>

<br>
<h3 style="text-align: center; color: black max-width: 70%; margin: auto;">log:</h3>
<br>

<div style="border-style: solid; border-width: 1px; border-color: black; overflow: auto; padding: 10px; font-size: 12px;">


<?php


$views = [
    "Insurance and Bills" => "CREATE VIEW Insurance_and_Bills AS
            SELECT Patient_Information.Fullname AS PatientName, Billing_Information.Address, Billing_Information.CardNumber, Insurance_Information.InsuranceProvider, Insurance_Information.CoverageType, Insurance_Information.CurrentCoverage, Billing_History.OutstandingPayment
            FROM Insurance_Information
            INNER JOIN Billing_Information ON Billing_Information.InsuranceCoverageID = Insurance_Information.InsuranceCoverageID
            INNER JOIN Patient_Information ON Billing_Information.BillingInformationID = Patient_Information.BillingInformationID
            INNER JOIN Billing_History ON Billing_Information.BillsID = Billing_History.BillsID
            ORDER BY Insurance_Information.InsuranceProvider
            WITH READ ONLY",
    "Appointments" => "CREATE VIEW AppointmentView AS
            SELECT patient_information.fullname AS Name, appointment_information.physician AS Physician, appointment_information.dateofappointment AS Date 
            FROM patient_information
            INNER JOIN appointment_information ON appointment_information.patientid=patient_information.patientid",
    "Medical Histories" => "CREATE VIEW Med_History AS 
            SELECT Patient_Information.Fullname AS PatientName, 
            Allergies.Type as Allergies, 
            Immunization_Information.VaccineName AS Immunizations, 
            Prescriptions_and_Medication.PrescriptionName AS Prescriptions, 
            Previous_Operations.SurgeryType AS Operations
            FROM Medical_History
            LEFT JOIN Patient_Information ON Medical_History.PatientID = Patient_Information.PatientID
            LEFT JOIN Allergies ON Medical_History.AllergiesID = Allergies.AllergiesID
            LEFT JOIN Immunization_Information ON Medical_History.ImmunizationsID = Immunization_Information.ImmunizationsID
            LEFT JOIN Prescriptions_and_Medication ON Medical_History.PrescriptionsID = Prescriptions_and_Medication.PrescriptionsID
            LEFT JOIN Previous_Operations ON Medical_History.PreviousOperationsID = Previous_Operations.PreviousOperationsID
            ORDER BY PatientName",
    "Patient Contact Information" => "CREATE VIEW Contacts AS
            SELECT Pi.FullName AS Name, Pci.Email, Pci.Phonenumber, Ec.FullName AS EC_Name, Ec.PhoneNumber AS EC_Phone, Ec.SecondaryPhoneNumber AS EC_Phone2, Ec.Email AS EC_Email
            FROM Patient_Information Pi
            INNER JOIN Emergency_Contact Ec on Pi.EmergencyContactsID = Ec.EmergencyContactsID
            INNER JOIN Patient_Contact_Information Pci on Pci.PatientID = Pi.PatientID
            ORDER BY Pi.FullName"
];


foreach ($views as $viewName => $viewCreate) {
    $stid = oci_parse($conn, $viewCreate);
    if (oci_execute($stid)) {
        echo "<div>Table '$viewName' Successfully Created.</div>";
    } else {
        $error = oci_error($stid);
        echo "<div style='color: #630000;'>Error Creating View '$viewName': " . htmlentities($error['message']) . "</div>";
    }

    oci_free_statement($stid);
}

oci_close($conn);

?>

</div>