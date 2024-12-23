<?php include ('login.php'); ?>

<br>
<h3 style="text-align: center; color: black max-width: 70%; margin: auto;">log:</h3>
<br>

<div style="border-style: solid; border-width: 1px; border-color: black; overflow: auto; padding: 10px; font-size: 8px;">

<?php

$populate = [
    "Insert into RPMANOHA.ALLERGIES (ALLERGIESID,TYPE,SEVERITY,ADDITIONALCOMMENTS) values ('AL23456789','Tree Nuts','Mild',null)",
    "Insert into RPMANOHA.ALLERGIES (ALLERGIESID,TYPE,SEVERITY,ADDITIONALCOMMENTS) values ('AL34567890','Tree Nuts','Severe',null)",
    "Insert into RPMANOHA.ALLERGIES (ALLERGIESID,TYPE,SEVERITY,ADDITIONALCOMMENTS) values ('AL90123456','Carrots','Mild',null)",
    "Insert into RPMANOHA.ALLERGIES (ALLERGIESID,TYPE,SEVERITY,ADDITIONALCOMMENTS) values ('AL13579246','Grass','Severe',null)",
    "Insert into RPMANOHA.ALLERGIES (ALLERGIESID,TYPE,SEVERITY,ADDITIONALCOMMENTS) values ('AL67890123','Tree Nuts','Mild',null)",
    "Insert into RPMANOHA.ALLERGIES (ALLERGIESID,TYPE,SEVERITY,ADDITIONALCOMMENTS) values ('AL01234567','Dairy','Mild','Lactose Intolerance')",
    "Insert into RPMANOHA.ALLERGIES (ALLERGIESID,TYPE,SEVERITY,ADDITIONALCOMMENTS) values ('AL12345678','Gluten','Mild','Mild gluten intolerance')",
    "Insert into RPMANOHA.ALLERGIES (ALLERGIESID,TYPE,SEVERITY,ADDITIONALCOMMENTS) values ('AL78901234','Shellfish','Severe',null)",

    "Insert into RPMANOHA.APPOINTMENT_INFORMATION (APPOINTMENT_ID,PATIENTID,DATEOFAPPOINTMENT,REASONFORVISIT,PHYSICIAN,DIAGNOSIS,TREATMENTPLAN) values ('AP20384756','JL56295638593718',to_date('22-01-24','RR-MM-DD'),'Complaint about wrist pain','Viktoriya Yancy','Carpel Tunnel Syndrome','Wrist stretches, surgery if symptoms do not change')",
    "Insert into RPMANOHA.APPOINTMENT_INFORMATION (APPOINTMENT_ID,PATIENTID,DATEOFAPPOINTMENT,REASONFORVISIT,PHYSICIAN,DIAGNOSIS,TREATMENTPLAN) values ('AP30495867','AH34850278583754',to_date('22-01-24','RR-MM-DD'),'Headache','Luca Kavanaugh','Lack of sleep','Sleep at an earlier time, Take melatonin gummies if needed')",
    "Insert into RPMANOHA.APPOINTMENT_INFORMATION (APPOINTMENT_ID,PATIENTID,DATEOFAPPOINTMENT,REASONFORVISIT,PHYSICIAN,DIAGNOSIS,TREATMENTPLAN) values ('AP91031423','AB98765432109876',to_date('22-01-24','RR-MM-DD'),'Unable to focus in class','Viktoriya Yancy','Lack of sleep','Sleep at an earlier time, Take melatonin gummies if needed')",
    "Insert into RPMANOHA.APPOINTMENT_INFORMATION (APPOINTMENT_ID,PATIENTID,DATEOFAPPOINTMENT,REASONFORVISIT,PHYSICIAN,DIAGNOSIS,TREATMENTPLAN) values ('AP12253645','UV37465019283746',to_date('22-01-24','RR-MM-DD'),'N/A','N/A','N/A','N/A')",
    "Insert into RPMANOHA.APPOINTMENT_INFORMATION (APPOINTMENT_ID,PATIENTID,DATEOFAPPOINTMENT,REASONFORVISIT,PHYSICIAN,DIAGNOSIS,TREATMENTPLAN) values ('AP10293847','XY12345678901234',to_date('23-07-05','RR-MM-DD'),'Persistent Headache.','Viktoriya Yancy','Mild Migraine, stress induced.','Motrin, Extra Strength.')",
    "Insert into RPMANOHA.APPOINTMENT_INFORMATION (APPOINTMENT_ID,PATIENTID,DATEOFAPPOINTMENT,REASONFORVISIT,PHYSICIAN,DIAGNOSIS,TREATMENTPLAN) values ('AP70819201','MN47561029384756',to_date('20-01-02','RR-MM-DD'),'Presented symptoms of a concussion.','Viktoriya Yancy','Grade 2 Concussion','Rest, minimal physical and mental exertion. Prescribing the patient Ibuprofen for persisting pain.')",
    "Insert into RPMANOHA.APPOINTMENT_INFORMATION (APPOINTMENT_ID,PATIENTID,DATEOFAPPOINTMENT,REASONFORVISIT,PHYSICIAN,DIAGNOSIS,TREATMENTPLAN) values ('AP40586978','CD10293847561029',to_date('22-09-15','RR-MM-DD'),'Runny nose, sore throat.','Luca Kavanaugh','Mild Cold.','Tylenol, rest.')",
    "Insert into RPMANOHA.APPOINTMENT_INFORMATION (APPOINTMENT_ID,PATIENTID,DATEOFAPPOINTMENT,REASONFORVISIT,PHYSICIAN,DIAGNOSIS,TREATMENTPLAN) values ('AP23364756','QR01928374650192',to_date('22-11-17','RR-MM-DD'),'Persistent Cough','Luca Kavanaugh','Acute Bronchitis','DayQuil, to be taken once a day according to package instructions.')",
    "Insert into RPMANOHA.APPOINTMENT_INFORMATION (APPOINTMENT_ID,PATIENTID,DATEOFAPPOINTMENT,REASONFORVISIT,PHYSICIAN,DIAGNOSIS,TREATMENTPLAN) values ('AP60708190','KL37465019283746',to_date('24-09-12','RR-MM-DD'),'Trouble sleeping, frequent nightmares.','Luca Kavanaugh','PTSD','Frequent therapy (try not to address the incident)')",
    "Insert into RPMANOHA.APPOINTMENT_INFORMATION (APPOINTMENT_ID,PATIENTID,DATEOFAPPOINTMENT,REASONFORVISIT,PHYSICIAN,DIAGNOSIS,TREATMENTPLAN) values ('AP80920312','EF56473829105647',to_date('24-08-31','RR-MM-DD'),'Tripping on a wall, unable to reach desk.','Viktoriya Yancy','Dwarfism','Limb lengthening surgery, calcium & vitamin D supplements')",
    "Insert into RPMANOHA.APPOINTMENT_INFORMATION (APPOINTMENT_ID,PATIENTID,DATEOFAPPOINTMENT,REASONFORVISIT,PHYSICIAN,DIAGNOSIS,TREATMENTPLAN) values ('AP01142534','GH01928374650192',to_date('21-07-02','RR-MM-DD'),'Random stomach issues, unable to pinpoint cause','Viktoriya Yancy','Lactose Intolerance','Lactaid pills, lactose intolerance therapy')",
    "Insert into RPMANOHA.APPOINTMENT_INFORMATION (APPOINTMENT_ID,PATIENTID,DATEOFAPPOINTMENT,REASONFORVISIT,PHYSICIAN,DIAGNOSIS,TREATMENTPLAN) values ('AP50697089','OP56473829105647',to_date('22-07-26','RR-MM-DD'),'Prepetually cold, in heat','Luca Kavanaugh','N/A','Follow up for more tests (speculation of attatchment issues)')",

    "Insert into RPMANOHA.BILLING_HISTORY (BILLSID,CHARGENAME,DATEOFCHARGE,ORIGINALCHARGE,OUTSTANDINGPAYMENT,PAID) values ('BB37025864','Lactose Intolerance Therapy',to_date('24-09-25','RR-MM-DD'),120,0,120)",
    "Insert into RPMANOHA.BILLING_HISTORY (BILLSID,CHARGENAME,DATEOFCHARGE,ORIGINALCHARGE,OUTSTANDINGPAYMENT,PAID) values ('BB42763890','Ibuprofen',to_date('24-09-11','RR-MM-DD'),9.11,8,1.11)",
    "Insert into RPMANOHA.BILLING_HISTORY (BILLSID,CHARGENAME,DATEOFCHARGE,ORIGINALCHARGE,OUTSTANDINGPAYMENT,PAID) values ('BB85619342','Limb Lenghtening Surgery',to_date('24-09-14','RR-MM-DD'),85950.2,85940,10.2)",
    "Insert into RPMANOHA.BILLING_HISTORY (BILLSID,CHARGENAME,DATEOFCHARGE,ORIGINALCHARGE,OUTSTANDINGPAYMENT,PAID) values ('BB94517208','Contact Therapy',to_date('24-08-31','RR-MM-DD'),69,0,69)",
    "Insert into RPMANOHA.BILLING_HISTORY (BILLSID,CHARGENAME,DATEOFCHARGE,ORIGINALCHARGE,OUTSTANDINGPAYMENT,PAID) values ('BB51029638','Felix Incident',to_date('24-10-01','RR-MM-DD'),65,0,65)",
    "Insert into RPMANOHA.BILLING_HISTORY (BILLSID,CHARGENAME,DATEOFCHARGE,ORIGINALCHARGE,OUTSTANDINGPAYMENT,PAID) values ('BB98374125','Fall',to_date('24-10-01','RR-MM-DD'),30,15,15)",
    "Insert into RPMANOHA.BILLING_HISTORY (BILLSID,CHARGENAME,DATEOFCHARGE,ORIGINALCHARGE,OUTSTANDINGPAYMENT,PAID) values ('BB76459308','Terrorism',to_date('24-10-01','RR-MM-DD'),900,900,0)",
    "Insert into RPMANOHA.BILLING_HISTORY (BILLSID,CHARGENAME,DATEOFCHARGE,ORIGINALCHARGE,OUTSTANDINGPAYMENT,PAID) values ('BB15092734','Victim',to_date('24-10-01','RR-MM-DD'),200,0,200)",
    "Insert into RPMANOHA.BILLING_HISTORY (BILLSID,CHARGENAME,DATEOFCHARGE,ORIGINALCHARGE,OUTSTANDINGPAYMENT,PAID) values ('BB49283715','Blood Work',to_date('24-05-20','RR-MM-DD'),313.3,0,313.3)",
    "Insert into RPMANOHA.BILLING_HISTORY (BILLSID,CHARGENAME,DATEOFCHARGE,ORIGINALCHARGE,OUTSTANDINGPAYMENT,PAID) values ('BB67105429','Appointment Cancellation Fee',to_date('23-09-11','RR-MM-DD'),40,40,0)",
    "Insert into RPMANOHA.BILLING_HISTORY (BILLSID,CHARGENAME,DATEOFCHARGE,ORIGINALCHARGE,OUTSTANDINGPAYMENT,PAID) values ('BB83492057','X-Ray Referral ',to_date('22-04-04','RR-MM-DD'),225.86,25.13,200.73)",
    "Insert into RPMANOHA.BILLING_HISTORY (BILLSID,CHARGENAME,DATEOFCHARGE,ORIGINALCHARGE,OUTSTANDINGPAYMENT,PAID) values ('BB23987461','Cough Medication Prescription',to_date('23-02-06','RR-MM-DD'),18.98,0,18.98)",

    "Insert into RPMANOHA.BILLING_INFORMATION (BILLINGINFORMATIONID,ADDRESS,CARDNUMBER,BILLSID,INSURANCECOVERAGEID) values ('BI98765432','53 Birchmount Rd, Markham','2534458715      ','BB51029638','IR87654321')",
    "Insert into RPMANOHA.BILLING_INFORMATION (BILLINGINFORMATIONID,ADDRESS,CARDNUMBER,BILLSID,INSURANCECOVERAGEID) values ('BI45678901','123 Terra Cotta, Brampton','654312345645    ','BB98374125','IR76543210')",
    "Insert into RPMANOHA.BILLING_INFORMATION (BILLINGINFORMATIONID,ADDRESS,CARDNUMBER,BILLSID,INSURANCECOVERAGEID) values ('BI99887766','81 Bay Street, Toronto','654365432       ','BB15092734','IR10987654')",
    "Insert into RPMANOHA.BILLING_INFORMATION (BILLINGINFORMATIONID,ADDRESS,CARDNUMBER,BILLSID,INSURANCECOVERAGEID) values ('BI10101011','76 Runnymede Ave, Toronto','265434564       ','BB76459308','IR13579246')",
    "Insert into RPMANOHA.BILLING_INFORMATION (BILLINGINFORMATIONID,ADDRESS,CARDNUMBER,BILLSID,INSURANCECOVERAGEID) values ('BI34567890','500 Queen St S, Bolton','7129845496225321','BB42763890','IR43210987')",
    "Insert into RPMANOHA.BILLING_INFORMATION (BILLINGINFORMATIONID,ADDRESS,CARDNUMBER,BILLSID,INSURANCECOVERAGEID) values ('BI11223344','188 Queens Quay W, Toronto','5885401088455098','BB85619342',null)",
    "Insert into RPMANOHA.BILLING_INFORMATION (BILLINGINFORMATIONID,ADDRESS,CARDNUMBER,BILLSID,INSURANCECOVERAGEID) values ('BI55667788','96 Mowat Ave, Toronto','7609379200151575','BB37025864','IR09876543')",
    "Insert into RPMANOHA.BILLING_INFORMATION (BILLINGINFORMATIONID,ADDRESS,CARDNUMBER,BILLSID,INSURANCECOVERAGEID) values ('BI87654321','7600 Kennedy Rd, Markham','8716060210731716','BB94517208','IR54321098')",
    "Insert into RPMANOHA.BILLING_INFORMATION (BILLINGINFORMATIONID,ADDRESS,CARDNUMBER,BILLSID,INSURANCECOVERAGEID) values ('BI12345678','40 King St W, Toronto','6885232375859434','BB49283715','IR98765432')",
    "Insert into RPMANOHA.BILLING_INFORMATION (BILLINGINFORMATIONID,ADDRESS,CARDNUMBER,BILLSID,INSURANCECOVERAGEID) values ('BI76543210','1950 Meadowvale Blvd, Mississauga','9119405705097475','BB67105429',null)",
    "Insert into RPMANOHA.BILLING_INFORMATION (BILLINGINFORMATIONID,ADDRESS,CARDNUMBER,BILLSID,INSURANCECOVERAGEID) values ('BI23456789','730 Rowntree Dairy Rd, Vaughan','8515897966700081','BB83492057','IR65432109')",
    "Insert into RPMANOHA.BILLING_INFORMATION (BILLINGINFORMATIONID,ADDRESS,CARDNUMBER,BILLSID,INSURANCECOVERAGEID) values ('BI20202030','36 Regatta Ave, Richmond Hill','7836410287491479','BB23987461','IR24681357')",

    "Insert into RPMANOHA.EMERGENCY_CONTACT (EMERGENCYCONTACTSID,FULLNAME,PHONENUMBER,EMAIL,SECONDARYPHONENUMBER) values ('EC94857231','Ryomen Sukuna',1111111199,null,null)",
    "Insert into RPMANOHA.EMERGENCY_CONTACT (EMERGENCYCONTACTSID,FULLNAME,PHONENUMBER,EMAIL,SECONDARYPHONENUMBER) values ('EC18395074','Wolf #2',8724603189,'thebetterwolf@gmail.com',null)",
    "Insert into RPMANOHA.EMERGENCY_CONTACT (EMERGENCYCONTACTSID,FULLNAME,PHONENUMBER,EMAIL,SECONDARYPHONENUMBER) values ('EC37489256','Whispurr',5418732064,'meowmeow@mew.nya',3164782509)",
    "Insert into RPMANOHA.EMERGENCY_CONTACT (EMERGENCYCONTACTSID,FULLNAME,PHONENUMBER,EMAIL,SECONDARYPHONENUMBER) values ('EC30571284','Argel Hunos',2195860473,'lifeisroblox@css.ca',6349201578)",
    "Insert into RPMANOHA.EMERGENCY_CONTACT (EMERGENCYCONTACTSID,FULLNAME,PHONENUMBER,EMAIL,SECONDARYPHONENUMBER) values ('EC59483720','Liam Beenken',5195183856,'liaaam@gmail.com',7808608701)",
    "Insert into RPMANOHA.EMERGENCY_CONTACT (EMERGENCYCONTACTSID,FULLNAME,PHONENUMBER,EMAIL,SECONDARYPHONENUMBER) values ('EC62714059','Violet Dorovic',2046374648,'arcan3@icloud.com',5874094287)",
    "Insert into RPMANOHA.EMERGENCY_CONTACT (EMERGENCYCONTACTSID,FULLNAME,PHONENUMBER,EMAIL,SECONDARYPHONENUMBER) values ('EC82937456','Eric Wolfe',3067902327,'wolves4Free@gmail.com',3067902327)",
    "Insert into RPMANOHA.EMERGENCY_CONTACT (EMERGENCYCONTACTSID,FULLNAME,PHONENUMBER,EMAIL,SECONDARYPHONENUMBER) values ('EC10394827','Joe Biden',2562462456,'joe.biden@biden',1134623462)",
    "Insert into RPMANOHA.EMERGENCY_CONTACT (EMERGENCYCONTACTSID,FULLNAME,PHONENUMBER,EMAIL,SECONDARYPHONENUMBER) values ('EC47289013','Jasper',3421623456,'barkbark@bork.ca',2515124512)",
    "Insert into RPMANOHA.EMERGENCY_CONTACT (EMERGENCYCONTACTSID,FULLNAME,PHONENUMBER,EMAIL,SECONDARYPHONENUMBER) values ('EC52048613','Confucious',3216532415,'iamwise@china.ca',null)",
    "Insert into RPMANOHA.EMERGENCY_CONTACT (EMERGENCYCONTACTSID,FULLNAME,PHONENUMBER,EMAIL,SECONDARYPHONENUMBER) values ('EC84719325','Keqing',4252522352,'rexlapismybeloved@gmail.ca',2515124512)",

    "Insert into RPMANOHA.EMERGENCY_RELATIONS (EMERGENCYCONTACTSID,PATIENTID,RELATION,PRIORITY) values ('EC59483720','XY12345678901234','Boyfriend','1')",
    "Insert into RPMANOHA.EMERGENCY_RELATIONS (EMERGENCYCONTACTSID,PATIENTID,RELATION,PRIORITY) values ('EC62714059','MN47561029384756','Spouse','1')",
    "Insert into RPMANOHA.EMERGENCY_RELATIONS (EMERGENCYCONTACTSID,PATIENTID,RELATION,PRIORITY) values ('EC82937456','CD10293847561029','Friend','2')",
    "Insert into RPMANOHA.EMERGENCY_RELATIONS (EMERGENCYCONTACTSID,PATIENTID,RELATION,PRIORITY) values ('EC94857231','KL37465019283746','Pookie','1')",
    "Insert into RPMANOHA.EMERGENCY_RELATIONS (EMERGENCYCONTACTSID,PATIENTID,RELATION,PRIORITY) values ('EC18395074','EF56473829105647','Friend','1')",
    "Insert into RPMANOHA.EMERGENCY_RELATIONS (EMERGENCYCONTACTSID,PATIENTID,RELATION,PRIORITY) values ('EC37489256','GH01928374650192','Cat','1')",
    "Insert into RPMANOHA.EMERGENCY_RELATIONS (EMERGENCYCONTACTSID,PATIENTID,RELATION,PRIORITY) values ('EC30571284','OP56473829105647','Spouse','1')",
    "Insert into RPMANOHA.EMERGENCY_RELATIONS (EMERGENCYCONTACTSID,PATIENTID,RELATION,PRIORITY) values ('EC10394827','JL56295638593718','The President','1')",
    "Insert into RPMANOHA.EMERGENCY_RELATIONS (EMERGENCYCONTACTSID,PATIENTID,RELATION,PRIORITY) values ('EC47289013','AH34850278583754','Dog','1')",
    "Insert into RPMANOHA.EMERGENCY_RELATIONS (EMERGENCYCONTACTSID,PATIENTID,RELATION,PRIORITY) values ('EC52048613','AB98765432109876','Alter-Ego','1')",
    "Insert into RPMANOHA.EMERGENCY_RELATIONS (EMERGENCYCONTACTSID,PATIENTID,RELATION,PRIORITY) values ('EC84719325','UV37465019283746','Friend','1')",

    "Insert into RPMANOHA.IMMUNIZATION_INFORMATION (IMMUNIZATIONSID,VACCINENAME,VACCINEMANUFACTURER,DOSAGENUMBER,REMAININGDOSAGES,DATEOFDOSAGE,ADMINISTRATIONROUTE,NEXTDOSAGE) values ('IM58273490','Tetanus','N/A','1',0,to_date('04-02-10','RR-MM-DD'),'Subcutaneous',null)",
    "Insert into RPMANOHA.IMMUNIZATION_INFORMATION (IMMUNIZATIONSID,VACCINENAME,VACCINEMANUFACTURER,DOSAGENUMBER,REMAININGDOSAGES,DATEOFDOSAGE,ADMINISTRATIONROUTE,NEXTDOSAGE) values ('IM71938452','Chickenpox','N/A','1',0,to_date('04-06-01','RR-MM-DD'),'Subcutaneous',null)",
    "Insert into RPMANOHA.IMMUNIZATION_INFORMATION (IMMUNIZATIONSID,VACCINENAME,VACCINEMANUFACTURER,DOSAGENUMBER,REMAININGDOSAGES,DATEOFDOSAGE,ADMINISTRATIONROUTE,NEXTDOSAGE) values ('IM85934271','Covid','N/A','2',0,to_date('22-10-12','RR-MM-DD'),'Subcutaneous',null)",
    "Insert into RPMANOHA.IMMUNIZATION_INFORMATION (IMMUNIZATIONSID,VACCINENAME,VACCINEMANUFACTURER,DOSAGENUMBER,REMAININGDOSAGES,DATEOFDOSAGE,ADMINISTRATIONROUTE,NEXTDOSAGE) values ('IM65743028','Covid','N/A','2',0,to_date('24-08-05','RR-MM-DD'),'Subcutaneous',null)",
    "Insert into RPMANOHA.IMMUNIZATION_INFORMATION (IMMUNIZATIONSID,VACCINENAME,VACCINEMANUFACTURER,DOSAGENUMBER,REMAININGDOSAGES,DATEOFDOSAGE,ADMINISTRATIONROUTE,NEXTDOSAGE) values ('IM48127390','Chickenpox','N/A','1',0,to_date('04-06-01','RR-MM-DD'),'Subcutaneous',null)",
    "Insert into RPMANOHA.IMMUNIZATION_INFORMATION (IMMUNIZATIONSID,VACCINENAME,VACCINEMANUFACTURER,DOSAGENUMBER,REMAININGDOSAGES,DATEOFDOSAGE,ADMINISTRATIONROUTE,NEXTDOSAGE) values ('IM17049283','Chickenpox','N/A','1',0,to_date('04-07-08','RR-MM-DD'),'Subcutaneous',null)",
    "Insert into RPMANOHA.IMMUNIZATION_INFORMATION (IMMUNIZATIONSID,VACCINENAME,VACCINEMANUFACTURER,DOSAGENUMBER,REMAININGDOSAGES,DATEOFDOSAGE,ADMINISTRATIONROUTE,NEXTDOSAGE) values ('IM29486731','Covid','Pfizer','2',0,to_date('22-08-11','RR-MM-DD'),'Subcutaneous',null)",
    "Insert into RPMANOHA.IMMUNIZATION_INFORMATION (IMMUNIZATIONSID,VACCINENAME,VACCINEMANUFACTURER,DOSAGENUMBER,REMAININGDOSAGES,DATEOFDOSAGE,ADMINISTRATIONROUTE,NEXTDOSAGE) values ('IM93208467','Chickenpox','N/A','1',0,to_date('04-05-10','RR-MM-DD'),'Subcutaneous',null)",
    "Insert into RPMANOHA.IMMUNIZATION_INFORMATION (IMMUNIZATIONSID,VACCINENAME,VACCINEMANUFACTURER,DOSAGENUMBER,REMAININGDOSAGES,DATEOFDOSAGE,ADMINISTRATIONROUTE,NEXTDOSAGE) values ('IM73829104','Influenza','GlaxoSmithKline','1',0,to_date('22-11-09','RR-MM-DD'),'Subcutaneous',null)",
    "Insert into RPMANOHA.IMMUNIZATION_INFORMATION (IMMUNIZATIONSID,VACCINENAME,VACCINEMANUFACTURER,DOSAGENUMBER,REMAININGDOSAGES,DATEOFDOSAGE,ADMINISTRATIONROUTE,NEXTDOSAGE) values ('IM52698314','Diphtheria','GlaxoSmithKline','1',0,to_date('24-06-06','RR-MM-DD'),'Intramuscular',to_date('34-06-02','RR-MM-DD'))",
    "Insert into RPMANOHA.IMMUNIZATION_INFORMATION (IMMUNIZATIONSID,VACCINENAME,VACCINEMANUFACTURER,DOSAGENUMBER,REMAININGDOSAGES,DATEOFDOSAGE,ADMINISTRATIONROUTE,NEXTDOSAGE) values ('IM60482719','Tetanus','Sanofi Pasteur','1',0,to_date('19-07-25','RR-MM-DD'),'Intramuscular',to_date('29-07-14','RR-MM-DD'))",
    "Insert into RPMANOHA.IMMUNIZATION_INFORMATION (IMMUNIZATIONSID,VACCINENAME,VACCINEMANUFACTURER,DOSAGENUMBER,REMAININGDOSAGES,DATEOFDOSAGE,ADMINISTRATIONROUTE,NEXTDOSAGE) values ('IM38102694','Influenza','GlaxoSmithKline','1',0,to_date('23-11-17','RR-MM-DD'),'Subcutaneous',null)",

    "Insert into RPMANOHA.INSURANCE_INFORMATION (INSURANCECOVERAGEID,INSURANCEPROVIDER,POLICYNUMBER,COVERAGETYPE,CURRENTCOVERAGE) values ('IR43210987','Desjardins','4367642','Point-of-Service Plan',1500)",
    "Insert into RPMANOHA.INSURANCE_INFORMATION (INSURANCECOVERAGEID,INSURANCEPROVIDER,POLICYNUMBER,COVERAGETYPE,CURRENTCOVERAGE) values ('IR09876543','Manulife','19823455','Catastrophic Plan',2000)",
    "Insert into RPMANOHA.INSURANCE_INFORMATION (INSURANCECOVERAGEID,INSURANCEPROVIDER,POLICYNUMBER,COVERAGETYPE,CURRENTCOVERAGE) values ('IR54321098','Desjardins','67188990','Point-of-Service Plan',1750)",
    "Insert into RPMANOHA.INSURANCE_INFORMATION (INSURANCECOVERAGEID,INSURANCEPROVIDER,POLICYNUMBER,COVERAGETYPE,CURRENTCOVERAGE) values ('IR87654321','SunlifeFinancial','3246362','Catastrophic Plan',2000)",
    "Insert into RPMANOHA.INSURANCE_INFORMATION (INSURANCECOVERAGEID,INSURANCEPROVIDER,POLICYNUMBER,COVERAGETYPE,CURRENTCOVERAGE) values ('IR76543210','BelairDirect','262354235','Preferred Provider Organization',5000)",
    "Insert into RPMANOHA.INSURANCE_INFORMATION (INSURANCECOVERAGEID,INSURANCEPROVIDER,POLICYNUMBER,COVERAGETYPE,CURRENTCOVERAGE) values ('IR13579246','SunlifeFinancial','2343252','Catastrophic Plan',1000)",
    "Insert into RPMANOHA.INSURANCE_INFORMATION (INSURANCECOVERAGEID,INSURANCEPROVIDER,POLICYNUMBER,COVERAGETYPE,CURRENTCOVERAGE) values ('IR10987654','BelairDirect','54522423','Point-of-Service Plan',500)",
    "Insert into RPMANOHA.INSURANCE_INFORMATION (INSURANCECOVERAGEID,INSURANCEPROVIDER,POLICYNUMBER,COVERAGETYPE,CURRENTCOVERAGE) values ('IR98765432','Desjardins','7957445','Preferred Provider Organization',2500)",
    "Insert into RPMANOHA.INSURANCE_INFORMATION (INSURANCECOVERAGEID,INSURANCEPROVIDER,POLICYNUMBER,COVERAGETYPE,CURRENTCOVERAGE) values ('IR65432109','Manulife','22012900','Health Maintenance Organization',1275)",
    "Insert into RPMANOHA.INSURANCE_INFORMATION (INSURANCECOVERAGEID,INSURANCEPROVIDER,POLICYNUMBER,COVERAGETYPE,CURRENTCOVERAGE) values ('IR24681357','SunlifeFinancial','91948439182','Point-of-Service Plan',1750)",

    "Insert into RPMANOHA.MEDICAL_HISTORY (PATIENTID,ALLERGIESID,FAMILYHISTORY,PREVIOUSOPERATIONSID,PRESCRIPTIONSID,IMMUNIZATIONSID,COMMENTS) values ('JL56295638593718','AL23456789','N/A',null,'PR98765432','IM58273490','N/A')",
    "Insert into RPMANOHA.MEDICAL_HISTORY (PATIENTID,ALLERGIESID,FAMILYHISTORY,PREVIOUSOPERATIONSID,PRESCRIPTIONSID,IMMUNIZATIONSID,COMMENTS) values ('AH34850278583754','AL34567890','N/A',null,null,'IM71938452','N/A')",
    "Insert into RPMANOHA.MEDICAL_HISTORY (PATIENTID,ALLERGIESID,FAMILYHISTORY,PREVIOUSOPERATIONSID,PRESCRIPTIONSID,IMMUNIZATIONSID,COMMENTS) values ('AB98765432109876','AL90123456','N/A',null,'PR99887766','IM85934271','N/A')",
    "Insert into RPMANOHA.MEDICAL_HISTORY (PATIENTID,ALLERGIESID,FAMILYHISTORY,PREVIOUSOPERATIONSID,PRESCRIPTIONSID,IMMUNIZATIONSID,COMMENTS) values ('UV37465019283746','AL13579246','N/A','PO10101011','PR10101011','IM65743028','N/A')",
    "Insert into RPMANOHA.MEDICAL_HISTORY (PATIENTID,ALLERGIESID,FAMILYHISTORY,PREVIOUSOPERATIONSID,PRESCRIPTIONSID,IMMUNIZATIONSID,COMMENTS) values ('KL37465019283746','AL67890123','N/A',null,null,'IM48127390','N/A')",
    "Insert into RPMANOHA.MEDICAL_HISTORY (PATIENTID,ALLERGIESID,FAMILYHISTORY,PREVIOUSOPERATIONSID,PRESCRIPTIONSID,IMMUNIZATIONSID,COMMENTS) values ('EF56473829105647',null,'N/A','PO11223344','PR11223344','IM17049283','N/A')",
    "Insert into RPMANOHA.MEDICAL_HISTORY (PATIENTID,ALLERGIESID,FAMILYHISTORY,PREVIOUSOPERATIONSID,PRESCRIPTIONSID,IMMUNIZATIONSID,COMMENTS) values ('GH01928374650192','AL01234567','N/A',null,'PR55667788','IM29486731','N/A')",
    "Insert into RPMANOHA.MEDICAL_HISTORY (PATIENTID,ALLERGIESID,FAMILYHISTORY,PREVIOUSOPERATIONSID,PRESCRIPTIONSID,IMMUNIZATIONSID,COMMENTS) values ('OP56473829105647',null,'N/A',null,'PR87654321','IM93208467','N/A')",
    "Insert into RPMANOHA.MEDICAL_HISTORY (PATIENTID,ALLERGIESID,FAMILYHISTORY,PREVIOUSOPERATIONSID,PRESCRIPTIONSID,IMMUNIZATIONSID,COMMENTS) values ('XY12345678901234','AL12345678','N/A',null,'PR12345678','IM73829104','N/A')",
    "Insert into RPMANOHA.MEDICAL_HISTORY (PATIENTID,ALLERGIESID,FAMILYHISTORY,PREVIOUSOPERATIONSID,PRESCRIPTIONSID,IMMUNIZATIONSID,COMMENTS) values ('MN47561029384756','AL78901234','N/A','PO76543210',null,'IM52698314','Patient oftens states that they will \"live forever\". Please schedule regular appointments.')",
    "Insert into RPMANOHA.MEDICAL_HISTORY (PATIENTID,ALLERGIESID,FAMILYHISTORY,PREVIOUSOPERATIONSID,PRESCRIPTIONSID,IMMUNIZATIONSID,COMMENTS) values ('CD10293847561029',null,'N/A',null,null,'IM60482719','N/A')",
    "Insert into RPMANOHA.MEDICAL_HISTORY (PATIENTID,ALLERGIESID,FAMILYHISTORY,PREVIOUSOPERATIONSID,PRESCRIPTIONSID,IMMUNIZATIONSID,COMMENTS) values ('QR01928374650192',null,'N/A',null,null,'IM38102694','N/A')",


    "Insert into RPMANOHA.MEDICAL_STAFF (ID,FULLNAME,ROLE) values ('GFT3290184726581','Jax Alfons','Nurse')",
    "Insert into RPMANOHA.MEDICAL_STAFF (ID,FULLNAME,ROLE) values ('MNL7854029134652','Adam Neville','Nurse')",
    "Insert into RPMANOHA.MEDICAL_STAFF (ID,FULLNAME,ROLE) values ('RJP1092847563987','Kaidi Quincy','Receptionist')",
    "Insert into RPMANOHA.MEDICAL_STAFF (ID,FULLNAME,ROLE) values ('ZWC5748201369475','Viktoriya Yancy','Physician')",
    "Insert into RPMANOHA.MEDICAL_STAFF (ID,FULLNAME,ROLE) values ('TQV9832175406281','Luca Kavanaugh','Physician')",


    "Insert into RPMANOHA.PATIENT_CONTACT_INFORMATION (PATIENTID,ADDRESS,EMAIL,PHONENUMBER) values ('XY12345678901234','40 King St W, Toronto','okmei@amazon.ca',3062882460)",
    "Insert into RPMANOHA.PATIENT_CONTACT_INFORMATION (PATIENTID,ADDRESS,EMAIL,PHONENUMBER) values ('CD10293847561029','730 Rowntree Dairy Rd, Vaughan','cantRead@google.com',6138422849)",
    "Insert into RPMANOHA.PATIENT_CONTACT_INFORMATION (PATIENTID,ADDRESS,EMAIL,PHONENUMBER) values ('MN47561029384756','1950 Meadowvale Blvd, Mississauga','djVanjaaa@icloud.com',4164590371)",
    "Insert into RPMANOHA.PATIENT_CONTACT_INFORMATION (PATIENTID,ADDRESS,EMAIL,PHONENUMBER) values ('QR01928374650192','36 Regatta Ave, Richmond Hill','seaToad4Life@hotmail.com',9052826299)",
    "Insert into RPMANOHA.PATIENT_CONTACT_INFORMATION (PATIENTID,ADDRESS,EMAIL,PHONENUMBER) values ('EF56473829105647','188 Queens Quay W, Toronto','eleadoor@rbcwall.com',7629854132)",
    "Insert into RPMANOHA.PATIENT_CONTACT_INFORMATION (PATIENTID,ADDRESS,EMAIL,PHONENUMBER) values ('OP56473829105647','7600 Kennedy Rd, Markham','rodog@roskip.com',5839207641)",
    "Insert into RPMANOHA.PATIENT_CONTACT_INFORMATION (PATIENTID,ADDRESS,EMAIL,PHONENUMBER) values ('KL37465019283746','500 Queen St S, Bolton','mik@suku.ca',4082765398)",
    "Insert into RPMANOHA.PATIENT_CONTACT_INFORMATION (PATIENTID,ADDRESS,EMAIL,PHONENUMBER) values ('GH01928374650192','96 Mowat Ave, Toronto','silly@tucows.ca',9176438250)",
    "Insert into RPMANOHA.PATIENT_CONTACT_INFORMATION (PATIENTID,ADDRESS,EMAIL,PHONENUMBER) values ('JL56295638593718','53 Birchmount Rd, Markham','hoi4@life.ca',5487993001)",
    "Insert into RPMANOHA.PATIENT_CONTACT_INFORMATION (PATIENTID,ADDRESS,EMAIL,PHONENUMBER) values ('AH34850278583754','123 Terra Cotta, Brampton','robloxislife@css.ca',9062851744)",
    "Insert into RPMANOHA.PATIENT_CONTACT_INFORMATION (PATIENTID,ADDRESS,EMAIL,PHONENUMBER) values ('UV37465019283746','76 Runnymede Ave, Toronto','dotasucks@gmail.com',1837841134)",
    "Insert into RPMANOHA.PATIENT_CONTACT_INFORMATION (PATIENTID,ADDRESS,EMAIL,PHONENUMBER) values ('AB98765432109876','81 Bay Street, Toronto','finance@bro.ca',4445556666)",


    "Insert into RPMANOHA.PATIENT_INFORMATION (PATIENTID,FULLNAME,HEALTHCARDNUMBER,SEX,GENDER,DATEOFBIRTH,DATEOFDEATH,BLOODTYPE,BILLINGINFORMATIONID,EMERGENCYCONTACTSID) values ('JL56295638593718','Jackie Lam','9163678326','Male','Male',to_date('04-01-18','RR-MM-DD'),null,'A+','BI98765432','EC10394827')",
    "Insert into RPMANOHA.PATIENT_INFORMATION (PATIENTID,FULLNAME,HEALTHCARDNUMBER,SEX,GENDER,DATEOFBIRTH,DATEOFDEATH,BLOODTYPE,BILLINGINFORMATIONID,EMERGENCYCONTACTSID) values ('AH34850278583754','Argel Hunos','6257206006','Male','Male',to_date('04-03-08','RR-MM-DD'),null,'O+','BI45678901','EC47289013')",
    "Insert into RPMANOHA.PATIENT_INFORMATION (PATIENTID,FULLNAME,HEALTHCARDNUMBER,SEX,GENDER,DATEOFBIRTH,DATEOFDEATH,BLOODTYPE,BILLINGINFORMATIONID,EMERGENCYCONTACTSID) values ('AB98765432109876','Eric Wong','9833672318','Male','Female',to_date('04-08-06','RR-MM-DD'),to_date('24-10-01','RR-MM-DD'),'O','BI99887766','EC52048613')",
    "Insert into RPMANOHA.PATIENT_INFORMATION (PATIENTID,FULLNAME,HEALTHCARDNUMBER,SEX,GENDER,DATEOFBIRTH,DATEOFDEATH,BLOODTYPE,BILLINGINFORMATIONID,EMERGENCYCONTACTSID) values ('UV37465019283746','Erkhes Unur','1884229999','Male','Male',to_date('04-10-03','RR-MM-DD'),null,'A-','BI10101011','EC84719325')",
    "Insert into RPMANOHA.PATIENT_INFORMATION (PATIENTID,FULLNAME,HEALTHCARDNUMBER,SEX,GENDER,DATEOFBIRTH,DATEOFDEATH,BLOODTYPE,BILLINGINFORMATIONID,EMERGENCYCONTACTSID) values ('KL37465019283746','Mikayla Morrison','9926464046','Female','Female',to_date('04-05-10','RR-MM-DD'),null,'B+','BI34567890','EC94857231')",
    "Insert into RPMANOHA.PATIENT_INFORMATION (PATIENTID,FULLNAME,HEALTHCARDNUMBER,SEX,GENDER,DATEOFBIRTH,DATEOFDEATH,BLOODTYPE,BILLINGINFORMATIONID,EMERGENCYCONTACTSID) values ('EF56473829105647','Eleanor Tien','0652590051','Female','Female',to_date('04-06-20','RR-MM-DD'),null,'O-','BI11223344','EC18395074')",
    "Insert into RPMANOHA.PATIENT_INFORMATION (PATIENTID,FULLNAME,HEALTHCARDNUMBER,SEX,GENDER,DATEOFBIRTH,DATEOFDEATH,BLOODTYPE,BILLINGINFORMATIONID,EMERGENCYCONTACTSID) values ('GH01928374650192','Lily Su','9866363459','Female','Female',to_date('04-08-06','RR-MM-DD'),null,'AB+','BI55667788','EC37489256')",
    "Insert into RPMANOHA.PATIENT_INFORMATION (PATIENTID,FULLNAME,HEALTHCARDNUMBER,SEX,GENDER,DATEOFBIRTH,DATEOFDEATH,BLOODTYPE,BILLINGINFORMATIONID,EMERGENCYCONTACTSID) values ('OP56473829105647','Rohan Manoharan','4149813197','Male','Male',to_date('04-04-30','RR-MM-DD'),null,'AB-','BI87654321','EC30571284')",
    "Insert into RPMANOHA.PATIENT_INFORMATION (PATIENTID,FULLNAME,HEALTHCARDNUMBER,SEX,GENDER,DATEOFBIRTH,DATEOFDEATH,BLOODTYPE,BILLINGINFORMATIONID,EMERGENCYCONTACTSID) values ('XY12345678901234','Katrina Mei','7783237266','Female','Female',to_date('04-01-02','RR-MM-DD'),null,'A-','BI12345678','EC59483720')",
    "Insert into RPMANOHA.PATIENT_INFORMATION (PATIENTID,FULLNAME,HEALTHCARDNUMBER,SEX,GENDER,DATEOFBIRTH,DATEOFDEATH,BLOODTYPE,BILLINGINFORMATIONID,EMERGENCYCONTACTSID) values ('MN47561029384756','Vanja Dorovic ','3028099169','Female','Female',to_date('04-06-07','RR-MM-DD'),null,'B+','BI76543210','EC62714059')",
    "Insert into RPMANOHA.PATIENT_INFORMATION (PATIENTID,FULLNAME,HEALTHCARDNUMBER,SEX,GENDER,DATEOFBIRTH,DATEOFDEATH,BLOODTYPE,BILLINGINFORMATIONID,EMERGENCYCONTACTSID) values ('CD10293847561029','Felix Nguyen','9151251778','Male','Male',to_date('03-04-25','RR-MM-DD'),null,'A-','BI23456789','EC82937456')",
    "Insert into RPMANOHA.PATIENT_INFORMATION (PATIENTID,FULLNAME,HEALTHCARDNUMBER,SEX,GENDER,DATEOFBIRTH,DATEOFDEATH,BLOODTYPE,BILLINGINFORMATIONID,EMERGENCYCONTACTSID) values ('QR01928374650192','Cindy Hua','9630044795','Female','Female',to_date('04-10-24','RR-MM-DD'),null,'O+','BI20202030','EC29047861')",


    "Insert into RPMANOHA.PRESCRIPTIONS_AND_MEDICATION (PRESCRIPTIONSID,CURRENTLYPRESCRIBED,MEDICATIONID,PRESCRIPTIONNAME,DOSAGE,FREQUENCY,DATEPRESCRIBED,REFILLS_REMAINING,PRESCRIBINGPHYSICIAN) values ('PR98765432',1,'345     ','ADHD Pills','2',1,to_date('23-04-11','RR-MM-DD'),2,'Viktoriya Yancy')",
    "Insert into RPMANOHA.PRESCRIPTIONS_AND_MEDICATION (PRESCRIPTIONSID,CURRENTLYPRESCRIBED,MEDICATIONID,PRESCRIPTIONNAME,DOSAGE,FREQUENCY,DATEPRESCRIBED,REFILLS_REMAINING,PRESCRIBINGPHYSICIAN) values ('PR99887766',1,'242     ','Sleeping Pills','2',1,to_date('22-01-29','RR-MM-DD'),0,'Luca Kavanaugh')",
    "Insert into RPMANOHA.PRESCRIPTIONS_AND_MEDICATION (PRESCRIPTIONSID,CURRENTLYPRESCRIBED,MEDICATIONID,PRESCRIPTIONNAME,DOSAGE,FREQUENCY,DATEPRESCRIBED,REFILLS_REMAINING,PRESCRIBINGPHYSICIAN) values ('PR10101011',1,'134     ','Anti-Depressants','3',2,to_date('22-04-12','RR-MM-DD'),2,'Luca Kavanaugh')",
    "Insert into RPMANOHA.PRESCRIPTIONS_AND_MEDICATION (PRESCRIPTIONSID,CURRENTLYPRESCRIBED,MEDICATIONID,PRESCRIPTIONNAME,DOSAGE,FREQUENCY,DATEPRESCRIBED,REFILLS_REMAINING,PRESCRIBINGPHYSICIAN) values ('PR55667788',1,'A675    ','Lactase','1',1,to_date('21-07-02','RR-MM-DD'),2,'Viktoriya Yancy')",
    "Insert into RPMANOHA.PRESCRIPTIONS_AND_MEDICATION (PRESCRIPTIONSID,CURRENTLYPRESCRIBED,MEDICATIONID,PRESCRIPTIONNAME,DOSAGE,FREQUENCY,DATEPRESCRIBED,REFILLS_REMAINING,PRESCRIBINGPHYSICIAN) values ('PR11223344',1,'D112    ','Vitamin D Supplements','1',1,to_date('24-08-31','RR-MM-DD'),0,'Viktoriya Yancy')",
    "Insert into RPMANOHA.PRESCRIPTIONS_AND_MEDICATION (PRESCRIPTIONSID,CURRENTLYPRESCRIBED,MEDICATIONID,PRESCRIPTIONNAME,DOSAGE,FREQUENCY,DATEPRESCRIBED,REFILLS_REMAINING,PRESCRIBINGPHYSICIAN) values ('PR87654321',0,'B231    ','Muscle Pain Relief','1',1,to_date('23-06-02','RR-MM-DD'),0,'Luca Kavanaugh')",
    "Insert into RPMANOHA.PRESCRIPTIONS_AND_MEDICATION (PRESCRIPTIONSID,CURRENTLYPRESCRIBED,MEDICATIONID,PRESCRIPTIONNAME,DOSAGE,FREQUENCY,DATEPRESCRIBED,REFILLS_REMAINING,PRESCRIBINGPHYSICIAN) values ('PR12345678',0,'W961    ','Azithromycin','1',1,to_date('17-01-17','RR-MM-DD'),0,'Luca Kavanaugh')",


    "Insert into RPMANOHA.PREVIOUS_OPERATIONS (PREVIOUSOPERATIONSID,OPERATIONDATE,SURGERYTYPE,INVASIVENESS,DURATIONOFSTAY,DATEOFRELEASE,ATTENDINGPHYSICIAN,COMPLICATIONS,NOTES) values ('PO10101011',to_date('21-06-10','RR-MM-DD'),'Hand reattachment surgery','Non-Invasive','2 Days',to_date('21-06-12','RR-MM-DD'),'Luca Kavanaugh','N/A','N/A')",
    "Insert into RPMANOHA.PREVIOUS_OPERATIONS (PREVIOUSOPERATIONSID,OPERATIONDATE,SURGERYTYPE,INVASIVENESS,DURATIONOFSTAY,DATEOFRELEASE,ATTENDINGPHYSICIAN,COMPLICATIONS,NOTES) values ('PO11223344',to_date('24-09-08','RR-MM-DD'),'Limb Lengthening Surgery','Invasive','6 Days',to_date('24-09-14','RR-MM-DD'),'Luca Kavanaugh','N/A','Desired length not suitable- only extended 3 inches')",
    "Insert into RPMANOHA.PREVIOUS_OPERATIONS (PREVIOUSOPERATIONSID,OPERATIONDATE,SURGERYTYPE,INVASIVENESS,DURATIONOFSTAY,DATEOFRELEASE,ATTENDINGPHYSICIAN,COMPLICATIONS,NOTES) values ('PO76543210',to_date('24-01-31','RR-MM-DD'),'Wisdom Tooth Extraction','Invasive','1 Day',to_date('24-01-31','RR-MM-DD'),'Luca Kavanaugh','Mild case of Dry socket in extraction site on the bottom LHS ','Patient bit attending nurse post-surgey. Patient was restrained and kept in the clinic for a full day for observation.')",
];

foreach ($populate as $query) {
    $stid = oci_parse($conn, $query);
    if (oci_execute($stid)) {
        echo "<div>Entry " . $query . "added." . "</div>";
    } else {
        $error = oci_error($stid);
        echo "<div style='color: #630000;'>Error adding" . $error['message'] . "</div>";
    }
}

oci_close($conn);

?>

</div>
