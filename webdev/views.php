<?php include('login.php'); ?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $viewName = $_POST['viewName'];

    if (!$viewName) {
        echo "<h4>No Query Number Provided</h4>";
        return;
    }

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

    if (array_key_exists($viewName, $views)) {
        $view = $views[$viewName];

        // Parse the query
        $execute = oci_parse($conn, $view);
        if (!$execute) {
            $e = oci_error($conn);
            echo "Error creating view: " . htmlentities($e['message'], ENT_QUOTES);
            return;
        }

        // Execute the query
        if (!oci_execute($execute)) {
            $e = oci_error($execute);
            echo "Error creating view: " . htmlentities($e['message'], ENT_QUOTES);
            return;
        }

        // Display the results in a table with headers
        echo "<table border='1'>\n";

        // Fetch and display headers
        $numCols = oci_num_fields($execute);
        echo "<tr>\n";
        for ($i = 1; $i <= $numCols; $i++) {
            $colName = oci_field_name($execute, $i);
            echo "<th>" . htmlentities($colName, ENT_QUOTES) . "</th>\n";
        }
        echo "</tr>\n";

        // Fetch and display data rows
        while ($row = oci_fetch_array($execute, OCI_ASSOC + OCI_RETURN_NULLS)) {
            echo "<tr>\n";
            foreach ($row as $item) {
                echo "<td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
            }
            echo "</tr>\n";
        }
        echo "</table>\n";
    } else {
        echo "<h4>Invalid View</h4>";
    }
}

// Close the Oracle connection
oci_close($conn);
?>