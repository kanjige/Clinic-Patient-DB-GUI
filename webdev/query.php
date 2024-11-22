<?php include('login.php'); ?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $queryNum = $_POST['queryNum'];

        if (!$queryNum) {
                echo "<h4>No Query Number Provided</h4>";
                return;
        }

        $queries = [
                1 => "SELECT DISTINCT type
                   FROM Allergies
                   ORDER BY type",
                2 => "SELECT DISTINCT Ii.VaccineName
                   FROM Immunization_Information Ii
                   WHERE Ii.AdministrationRoute = 'Subcutaneous'",
                3 => "SELECT Po.Invasiveness AS Type, COUNT(Po.Invasiveness) AS Amount
                   FROM Previous_Operations Po
                   GROUP BY Po.Invasiveness",
                4 => "SELECT Appointment_Information.reasonforvisit, Appointment_Information.physician, Appointment_Information.dateofappointment
                   FROM Appointment_Information
                   WHERE physician = 'Viktoriya Yancy'
                   ORDER BY dateofappointment",
                5 => "SELECT Billing_Information.billinginformationid, Patient_Information.FullName, Patient_Information.PatientID
                   FROM Billing_Information
                   INNER JOIN patient_information ON Billing_Information.BillingInformationID=Patient_Information.BillingInformationID
                   ORDER BY Patient_Information.dateofbirth",
                6 => "SELECT billing_history.originalcharge, billing_history.chargename, billing_information.address, billing_history.dateofcharge
                   FROM Billing_History
                   INNER JOIN Billing_Information ON Billing_Information.BillsID=Billing_History.BillsID
                   ORDER BY billing_history.originalcharge DESC",
                7 => "SELECT patient_information.fullname AS Patient, emergency_contact.fullname AS Contact, emergency_relations.relation
                   FROM emergency_contact
                   INNER JOIN patient_information ON emergency_contact.emergencycontactsid=patient_information.emergencycontactsid
                   INNER JOIN emergency_relations ON emergency_contact.emergencycontactsid=emergency_relations.emergencycontactsid
                   ORDER BY Patient_Information.Fullname",
                8 => "SELECT Patient_Information.fullname AS Fullname, Patient_Contact_Information.address, Patient_Contact_Information.email
                   FROM Patient_Contact_Information
                   INNER JOIN Patient_Information ON Patient_Contact_Information.PatientID=Patient_Information.PatientID
                   ORDER BY Patient_Information.fullname",
                9 => "SELECT Patient_Information.Fullname AS Fullname, Medical_History.PatientID, Medical_History.AllergiesID, Medical_History.PrescriptionsID
                   FROM Medical_History
                   INNER JOIN Patient_Information ON Medical_History.PatientID=Patient_Information.PatientID
                   WHERE Medical_History.AllergiesID IS NOT NULL AND Medical_History.PrescriptionsID IS NOT NULL",
                10 => "SELECT COUNT (Patient_Information.Bloodtype) AS Patient_Count, Patient_Information.Bloodtype
                   FROM Patient_Information
                   GROUP BY Patient_Information.Bloodtype",
                11 => "SELECT Ms.ID, Ms.Fullname AS Name, Ms.Role
                   FROM Medical_Staff Ms
                   WHERE Ms.Role = 'Nurse' OR Ms.Role = 'Receptionist'
                   ORDER BY Ms.Role, Ms.Fullname",
                12 => "SELECT Patient_Information.Fullname AS Name, Insurance_Information.InsuranceProvider, Insurance_Information.CoverageType, Insurance_Information.CurrentCoverage
                   FROM Insurance_Information
                   INNER JOIN Billing_Information ON Billing_Information.InsuranceCoverageID = Insurance_Information.InsuranceCoverageID
                   INNER JOIN Patient_Information ON Billing_Information.BillingInformationID = Patient_Information.BillingInformationID
                   ORDER BY Insurance_Information.InsuranceProvider",
                13 => "SELECT Pi.Fullname AS Name, Pm.PrescriptionName AS Prescription, Pm.Dosage, Pm.DatePrescribed
                   FROM Prescriptions_and_Medication Pm
                   INNER JOIN Medical_History Mh on Pm.PrescriptionsID = Mh.PrescriptionsID
                   INNER JOIN Patient_Information Pi on Mh.PatientID = Pi.PatientID
                   WHERE Pm.CurrentlyPrescribed = 1
                   ORDER BY Pm.DatePrescribed DESC",
                14 => "SELECT Pi.Fullname AS Name, Pm.PrescriptionName AS Prescription, Pm.Dosage AS Dose, Pm.DatePrescribed, Ai.Diagnosis, Ai.TreatmentPlan
                   FROM Prescriptions_and_Medication Pm
                   INNER JOIN Medical_History Mh on Pm.PrescriptionsID = Mh.PrescriptionsID
                   INNER JOIN Patient_Information Pi on Mh.PatientID = Pi.PatientID
                   INNER JOIN Appointment_Information Ai on Mh.PatientID = Ai.PatientID
                   WHERE (Pm.CurrentlyPrescribed = 1) AND (Pm.DatePrescribed BETWEEN (Ai.DateOfAppointment - 30) AND (Ai.DateOfAppointment + 30))
                   ORDER BY Pm.DatePrescribed DESC",
                15 => "SELECT COUNT (Insurance_Information.CurrentCoverage) AS PatientCount, Insurance_Information.CurrentCoverage
                   FROM Insurance_Information
                   GROUP BY Insurance_Information.CurrentCoverage
                   HAVING (Insurance_Information.CurrentCoverage) > 1000",
                16 => "SELECT Patient_Information.fullname AS Fullname, Patient_Contact_Information.address, Patient_Contact_Information.email
                   FROM Patient_Contact_Information
                   INNER JOIN Patient_Information ON Patient_Contact_Information.PatientID=Patient_Information.PatientID
                   WHERE EXISTS
                       (SELECT Patient_Information.Fullname AS Fullname, Medical_History.PatientID, Medical_History.AllergiesID
                       FROM Medical_History
                       WHERE Medical_History.PatientID = Patient_Information.PatientID AND Medical_History.AllergiesID IS NOT NULL)",
                17 => "SELECT Patient_Information.fullname AS Fullname, Patient_Information.HealthCardNumber, Previous_Operations.SurgeryType AS Surgeries_and_Prescriptions
                   FROM Patient_Information
                   INNER JOIN Medical_History ON Patient_Information.PatientID=Medical_History.PatientID
                   INNER JOIN Previous_Operations ON Medical_History.PreviousOperationsID=Previous_Operations.PreviousOperationsID
                   UNION
                       SELECT Patient_Information.fullname AS Fullname, Patient_Information.HealthCardNumber, Prescriptions_And_Medication.PrescriptionName
                       FROM Patient_Information
                       INNER JOIN Medical_History ON Patient_Information.PatientID=Medical_History.PatientID
                       INNER JOIN Prescriptions_And_Medication ON Medical_History.PrescriptionsID=Prescriptions_And_Medication.PrescriptionsID",
                18 => "SELECT Billing_Information.billinginformationid, Patient_Information.FullName, Patient_Information.PatientID
                   FROM Billing_Information
                   INNER JOIN patient_information ON   Billing_Information.BillingInformationID=Patient_Information.BillingInformationID
                   MINUS
                       (SELECT Billing_Information.billinginformationid, Patient_Information.FullName, Patient_Information.PatientID
                       FROM Billing_Information
                       INNER JOIN Patient_Information ON Patient_Information.BillingInformationID=Billing_Information.BillingInformationID
                       INNER JOIN Billing_History ON Billing_Information.BillsID=Billing_History.BillsID
                       WHERE Billing_History.OutstandingPayment = 0)"
        ];

        if (array_key_exists($queryNum, $queries)) {
                $query = $queries[$queryNum];

                // Parse the query
                $execute = oci_parse($conn, $query);
                if (!$execute) {
                        $e = oci_error($conn);
                        echo "Error parsing query: " . htmlentities($e['message'], ENT_QUOTES);
                        return;
                }

                // Execute the query
                if (!oci_execute($execute)) {
                        $e = oci_error($execute);
                        echo "Error executing query: " . htmlentities($e['message'], ENT_QUOTES);
                        return;
                }


                echo "<style>
                table {
                    border: 1px solid; 
                    border-collapse: collapse;
                    text-align: center;
                    margin-left: auto;
                    margin-right: auto;
                }
                td, th {
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
              </style>";

                // Display the results in a table
                echo "<table border='1'>\n";
                while ($row = oci_fetch_array($execute, OCI_ASSOC + OCI_RETURN_NULLS)) {
                        echo "<tr>\n";
                        foreach ($row as $item) {
                                echo "<td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
                        }
                        echo "</tr>\n";
                }
                echo "</table>\n";
        } else {
                echo "<h4>Invalid Query</h4>";
        }
}

// Close the Oracle connection
oci_close($conn);
?>