<?php

ob_start();
include('../config.php');
$where = "where 1=1";
$strLocationID = '0';
$stateid = '0';
$user = mysqli_query($dbconn, "SELECT * FROM `agencymanagerlocation`  where  iagencymanagerid='" . $_SESSION['agencysupervisorid'] . "'  ");
while ($userid = mysqli_fetch_array($user)) {
    $strLocationID = $userid['iLocationId'] . ',' . $strLocationID;
}
$strLocationID = rtrim($strLocationID, ", ");

if ($_REQUEST['completedstatus'] != "") {

    $where .= " and  fos_completed_status = '" . $_REQUEST['completedstatus'] . "' ";
}
$FormDate = $_REQUEST['FormDate'];
if ($_REQUEST['FormDate'] != NULL && isset($_REQUEST['FormDate'])) {

    $where .= "  and STR_TO_DATE(strEntryDate,'%d-%m-%Y %H:%i:%s') >= STR_TO_DATE('" . $_REQUEST['FormDate'] . "','%d-%m-%Y') ";
}
$toDate = $_REQUEST['toDate'];;
if ($_REQUEST['toDate'] != NULL && isset($_REQUEST['toDate'])) {

    $where .= "  and STR_TO_DATE(strEntryDate,'%d-%m-%Y %H:%i:%s') <= STR_TO_DATE('" . $_REQUEST['toDate'] . "','%d-%m-%Y') ";
}
if ($_REQUEST['customer_city_id'] != "") {

    $where .= " and  customer_city_id = '" . $_REQUEST['customer_city_id'] . "' ";
}
if ($_REQUEST['location'] != "") {

    $where .= " and  Branch = '" . $_REQUEST['location'] . "' ";
}
if ($_REQUEST['fosid'] != "") {

    $where .= " and  fosid = '" . $_REQUEST['fosid'] . "' ";
}

$sql1 = "SELECT * FROM `application` " . $where . " and customer_city_id in  (" . $strLocationID . ") and is_assignto_am ='1' and  am_accaptance='1' and fosid > 0 and agencyid='" . $_SESSION['agencyname'] . "'   ";




$result1 = mysqli_query($dbconn, $sql1);
//$date=date('d-m-Y');

$filename = 'cmassigncase.xls';

header("Content-Type: application/vnd.ms-excel");
header("Content-disposition: attachment; filename=" . $filename);

ob_end_clean();

echo
    "SrNo"
        . "\t  Allocation Date"
        . "\t  Return Till"
        . "\t  Supervisor Assigned Date Time"
        . "\t  Unique Id"
        . "\t  Account No"
        . "\t  Agency Name"
        . "\t  PRODUCT"
        . "\t  App Id"
        . "\t  Bkt"
        . "\t  Customer Name"
        . "\t  Fathers name"
        . "\t  Asset Make"
        . "\t  Branch"
        . "\t  Customer City"
        . "\t  State"
        . "\t  Due Month"
        . "\t  Allocation Date"
        . "\t  Allocation CODE"
        . "\t  Bounce Reason"
        . "\t  Loan amount"
        . "\t  Loan booking Date"
        . "\t  Loan maturity date"
        . "\t  Frist Emi Date"
        . "\t  Due date"
        . "\t  Emi Amount Collected"
        . "\t  Installment_Overdue_Amount"
        . "\t  Bcc"
        . "\t  Lpp"
        . "\t  Total penlty"
        . "\t  Principal outstanding"
        . "\t  Vehicle Registration No"
        . "\t  Supplier"
        . "\t  Tenure"
        . "\t  Customer Address"
        . "\t  TC1"
        . "\t  TC2"
        . "\t  TC3"
        . "\t  Visit Address"
        . "\t  Contact Number"
        // . "\t  Alternate Contact Number"
        . "\t  Collection Manager"
        . "\t  State Manager "
        . "\t  Ref_1_Name"
        . "\t  Contact_Detail"
        . "\t  Ref_2_Name"
        . "\t  Contact_Detail_ref2"
        . "\t  Fos Name"
        . "\t  Fos Id"
        . "\t  Fos Comment"
        . "\t  Fos Status"
        . "\t  Fos Submit Date"
        . "\t  Fos Submit Time"
        //. "\t  ptp datetime"
        . "\t  Alternet MobileNo"
        . "\t  Pincode"
        . "\t  Payment Collected Date"
        . "\t  Payment Collected Amount"
        . "\t  Penal Amount Collected"
        . "\t  Total  Amount Collected"
        . "\t ptp Re-schedule date"
        . "\t  PTP Date"
        . "\t  PTP Amount"
        . "\t  Time Slot"
        . "\n";
$i = 1;
while ($rows = mysqli_fetch_array($result1)) {

    //$lager = mysqli_fetch_array(mysqli_query($dbconn, "SELECT * FROM `ledger` where  iUserId='" . $rows['usersid'] . "'     ORDER BY `ledger` DESC limit 1 "));
    $asname = mysqli_fetch_array(mysqli_query($dbconn, "SELECT * FROM `agency`  where  Agencyid='" . $rows['agencyid'] . "' "));
    $status = mysqli_fetch_array(mysqli_query($dbconn, "SELECT * FROM `fosstatusdrropdown`  where fosstatusdrropdownid ='" . $rows['fos_completed_status'] . "'"));
    $fos = mysqli_fetch_array(mysqli_query($dbconn, "SELECT * FROM `agencymanager`  where agencymanagerid ='" . $rows['fosid'] . "'"));
    $totalamt = $rows['Payment_Collected_Amount'] + $rows['Emi_amount'];
    $tc = '';
    $tccomment = mysqli_query($dbconn, "SELECT * FROM tchistory  where  applicationid='" . $rows['applicationid'] . "' ORDER BY tchistoryid desc limit 3");
    if (mysqli_num_rows($tccomment) > 0) {
        while ($tccomments = mysqli_fetch_array($tccomment)) {
            $tc = $tccomments['tccomment'] . ',' . $tc;
        }
    }
    $comment = rtrim($tc, ',');
    $tccom = explode(',', $tc);
    $fossubmit = explode(' ', $rows['fos_submit_datetime']);
    echo
        $i
            . "\t" . $rows['strEntryDate']
            . "\t" . $rows['excel_return_date']
            . "\t" . $rows['assign_as_datetime']
            . "\t" . $rows['uniqueId']
            . "\t" . $rows['Account_No']
            . "\t" . $asname['agencyname']
            . "\t" . $rows['PRODUCT']
            . "\t" . $rows['App_Id']
            . "\t" . $rows['Bkt']
            . "\t" . $rows['Customer_Name']
            . "\t" . $rows['Fathers_name']
            . "\t" . $rows['Asset_Make']
            . "\t" . $rows['Branch']
            . "\t" . $rows['customer_city']
            . "\t" . $rows['State']
            . "\t" . $rows['Due_Month']
            . "\t" . $rows['Allocation_Date']
            . "\t" . $rows['Allocation_CODE']
            . "\t" . $rows['Bounce_Reason']
            . "\t" . $rows['Loan_amount']
            . "\t" . $rows['Loan_booking_Date']
            . "\t" . $rows['Loan_maturity_date']
            . "\t" . $rows['Frist_Emi_Date']
            . "\t" . $rows['Due_date']
            . "\t" . $rows['Emi_amount']
            . "\t" . $rows['Installment_Overdue_Amount']
            . "\t" . $rows['Bcc']
            . "\t" . $rows['Lpp']
            . "\t" . $rows['Total_penlty']
            . "\t" . $rows['Principal_outstanding']
            . "\t" . $rows['Vehicle_Registration_No']
            . "\t" . $rows['Supplier']
            . "\t" . $rows['Tenure']
            . "\t" . $rows['Customer_Address']
            . "\t" . $tccom[0]
            . "\t" . $tccom[1]
            . "\t" . $tccom[2]
            . "\t" . $rows['visit_address']
            . "\t" . $rows['Contact_Number']
            //  . "\t" . $rows['alternate_contact_number']
            . "\t" . $rows['Collection_Manager']
            . "\t" . $rows['State_Manager']
            . "\t" . $rows['Ref_1_Name']
            . "\t" . $rows['Contact_Detail']
            . "\t" . $rows['Ref_2_Name']
            . "\t" . $rows['Contact_Detail_ref2']
            . "\t" . $fos['employeename']
            . "\t" . $fos['loginId']
            . "\t" . $rows['fos_comment']
            . "\t" . $status['status']
            . "\t" . $fossubmit[0]
            . "\t" . $fossubmit[1]
            //. "\t" . $rows['ptp_datetime']
            . "\t" . $rows['AlternetMobileNo']
            . "\t" . $rows['Pincode']
            . "\t" . $rows['Payment_Collected_Date']
            . "\t" . $rows['Payment_Collected_Amount']
            . "\t" . $rows['penal']
            . "\t" . $rows['totalamt']
            . "\t" . $rows['ptp_datetime']
            . "\t" . $rows['PTP_Date']
            . "\t" . $rows['PTP_Amount']
            . "\t" . $rows['Time_Slot']
            . "\n";
    $i++;
}
