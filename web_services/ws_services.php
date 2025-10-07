<?php

ob_start();
header('Content-Type: application/json');
include_once '../common.php';
include_once '../password_hash.php';
$connect = new connect();
$actions = isset($_REQUEST['action']) ? strtolower(trim($_REQUEST['action'])) : '';
extract($_REQUEST);

if ($actions == 'loginfos') {

    $request_body = @file_get_contents('php://input');
    $obj = json_decode($request_body);
    $md5Has = md5($obj->password);
    $sql = "select * from agencymanager where loginId = '" . $obj->loginId . "' and isDelete='0' and type='FOS' ";
    $result = mysqli_query($dbconn, $sql);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $good_hash = PBKDF2_HASH_ALGORITHM . ":" . PBKDF2_ITERATIONS . ":" . $row['salt'] . ":" . $row['password'];

        if (validate_password($obj->password, $good_hash)) {

            $sql1 = "select * from agencymanager where loginId ='" . $obj->loginId . "' and isDelete='0' and type='FOS' ";
            $result1 = mysqli_query($dbconn, $sql1);
            $row1 = mysqli_fetch_assoc($result1);

            $output['FosDetail'] = $row1;
            $output['message'] = 'login sucessfull';
            $output['success'] = '1';
        } else {
            $output['message'] = 'Password not match';
            $output["success"] = '0';
        }
    } else {

        $output['message'] = 'User or Password not match';
        $output['success'] = '0';
    }
} else if ($actions == 'fosassignapplication') {

    $request_body = @file_get_contents('php://input');
    $obj = json_decode($request_body);
    $md5Has = md5($obj->password);
    $sql = "select * from agencymanager where loginId = '" . $obj->loginId . "' and isDelete='0' and type='FOS' ";
    $result = mysqli_query($dbconn, $sql);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $good_hash = PBKDF2_HASH_ALGORITHM . ":" . PBKDF2_ITERATIONS . ":" . $row['salt'] . ":" . $row['password'];

        if (validate_password($obj->password, $good_hash)) {

            if ($obj->applicationid == '0') {
                $filterstr = "select *  from application WHERE is_assignto_fos='1' and am_accaptance='1' and fosid = '" . $row['agencymanagerid'] . "' and fos_completed='0' and runsheet='0' and (PTP_Date='' or ptp_datetime ='') ORDER BY STR_TO_DATE(PTP_Date,'%d-%m-%Y') ASC";
            } else {
                $filterstr = "select *,(select fosstatusdrropdown.status from fosstatusdrropdown WHERE fosstatusdrropdown.fosstatusdrropdownid=application.fos_completed_status)as status  from application WHERE  applicationid='" . $obj->applicationid . "' and  is_assignto_fos='1' and am_accaptance='1' and fosid = '" . $row['agencymanagerid'] . "'  ORDER BY STR_TO_DATE(PTP_Date,'%d-%m-%Y') ASC  ";
            }
            $result1 = mysqli_query($dbconn, $filterstr);
            if (mysqli_num_rows($result1) > 0) {
                while ($row = mysqli_fetch_assoc($result1)) {

                    $output['fosassignapplicationDetail'] [] = $row;
                }
                $output['message'] = 'Data Found';
                $output['success'] = '1';
            } else {
                $output['message'] = 'Not Data Found';
                $output["success"] = '0';
            }
        } else {
            $output['message'] = 'User or Password not match';
            $output['success'] = '0';
        }
    } else {
        $output['message'] = 'User  not match';
        $output['success'] = '0';
    }
} else if ($actions == 'tcdetaillist') {

    $request_body = @file_get_contents('php://input');
    $obj = json_decode($request_body);
    
    $sql = "select * from agencymanager where loginId = '" . $obj->loginId . "' and isDelete='0' and type='FOS' ";
    $result = mysqli_query($dbconn, $sql);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $good_hash = PBKDF2_HASH_ALGORITHM . ":" . PBKDF2_ITERATIONS . ":" . $row['salt'] . ":" . $row['password'];

        if (validate_password($obj->password, $good_hash)) {

            $filterstr = "SELECT * FROM tchistory  where  applicationid='" . $obj->applicationid . "' ORDER BY tchistoryid desc limit 3 ";

            $result1 = mysqli_query($dbconn, $filterstr);
            if (mysqli_num_rows($result1) > 0) {
                while ($row = mysqli_fetch_assoc($result1)) {

                    $output['tcdetaillistview'] [] = $row;
                }
                $output['message'] = 'Data Found';
                $output['success'] = '1';
            } else {
                $output['message'] = 'Not Data Found';
                $output["success"] = '0';
            }
        } else {
            $output['message'] = 'User or Password not match';
            $output['success'] = '0';
        }
    } else {
        $output['message'] = 'User  not match';
        $output['success'] = '0';
    }
}  else if ($actions == 'foscomplitedapplication') {

    $request_body = @file_get_contents('php://input');
    $obj = json_decode($request_body);
    $md5Has = md5($obj->password);
    $sql = "select * from agencymanager where loginId = '" . $obj->loginId . "' and isDelete='0' and type='FOS' ";
    $result = mysqli_query($dbconn, $sql);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $good_hash = PBKDF2_HASH_ALGORITHM . ":" . PBKDF2_ITERATIONS . ":" . $row['salt'] . ":" . $row['password'];

        if (validate_password($obj->password, $good_hash)) {


            $filterstr = "select *  from application WHERE is_assignto_fos='1' and fosid = '" . $row['agencymanagerid'] . "' and fos_completed='1' ";
            $result1 = mysqli_query($dbconn, $filterstr);
            if (mysqli_num_rows($result1) > 0) {
                while ($row = mysqli_fetch_assoc($result1)) {

                    $output['fosassignapplicationDetail'] [] = $row;
                }
                $output['message'] = 'Data Found';
                $output['success'] = '1';
            } else {
                $output['message'] = 'Not Data Found';
                $output["success"] = '0';
            }
        } else {

            $output['message'] = 'User or Password not match';
            $output['success'] = '0';
        }
    } else {
        $output['message'] = 'User  not match';
        $output['success'] = '0';
    }
} else if ($actions == 'submitmultiapplicationdetails') {
//veryfied app
    $request_body = @file_get_contents('php://input');
    $obj = json_decode($request_body);
    $md5Has = md5($obj->password);
    $sql = "select * from agencymanager where loginId = '" . $obj->loginId . "' and isDelete='0' and type='FOS' ";
    $result = mysqli_query($dbconn, $sql);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $good_hash = PBKDF2_HASH_ALGORITHM . ":" . PBKDF2_ITERATIONS . ":" . $row['salt'] . ":" . $row['password'];

        if (validate_password($obj->password, $good_hash)) {


            $count = count($obj->applicationdetails);
            for ($iCounter = 0; $iCounter < $count; $iCounter++) {
                if ($obj->applicationdetails[$iCounter]->fos_completed_status == '1') {
                    $fos_completed = '1';
                } else if ($obj->applicationdetails[$iCounter]->fos_completed_status == '2') {
                    $fos_completed = '1';
                } else if ($obj->applicationdetails[$iCounter]->fos_completed_status == '3') {
                    //ptpresheduled
                    $fos_completed = '1';
                } else if ($obj->applicationdetails[$iCounter]->fos_completed_status == '4') {
                    $fos_completed = '1';
                } else if ($obj->applicationdetails[$iCounter]->fos_completed_status == '16') {
                    $fos_completed = '1';
                }
                $applicationdetails = array(
                    "fos_completed_status" => $obj->applicationdetails[$iCounter]->fos_completed_status,
                    "fos_completed" => $fos_completed,
                    "fos_comment" => $obj->applicationdetails[$iCounter]->fos_comment,
                    'ptp_datetime' => $obj->applicationdetails[$iCounter]->ptp_datetime,
                    "fos_submit_datetime" => $obj->applicationdetails[$iCounter]->fos_submit_datetime,
                    "runsheet"=>'0',
                    "strIP" => $obj->applicationdetails[$iCounter]->strIP,
                );
                $where = " where applicationid = '" . $obj->applicationdetails[$iCounter]->applicationid . "' ";
                $applicationdetails_res = $connect->updaterecord($dbconn, 'application', $applicationdetails, $where);
            }
            if ($applicationdetails_res) {
                $output['message'] = '';
                $output['success'] = '1';
            } else {
                $output['message'] = 'Not Data Found';
                $output["success"] = '0';
            }
        } else {
            $output['message'] = 'Not Data Found';
            $output["success"] = '0';
        }
    } else {
        $output['message'] = 'User or Password not match';
        $output['success'] = '0';
    }
} else if ($actions == 'submitsingelapplicationdetails') {
//veryfied app
    $request_body = @file_get_contents('php://input');
    $obj = json_decode($request_body);

    $md5Has = md5($obj->password);
    $sql = "select * from agencymanager where loginId = '" . $obj->loginId . "' and isDelete='0' and type='FOS' ";
    $result = mysqli_query($dbconn, $sql);
    if (mysqli_num_rows($result) == 1) {

        $row = mysqli_fetch_array($result);
        $good_hash = PBKDF2_HASH_ALGORITHM . ":" . PBKDF2_ITERATIONS . ":" . $row['salt'] . ":" . $row['password'];

        if (validate_password($obj->password, $good_hash)) {
            $fos_submit_date = date('d-m-Y');
            if ($obj->Payment_Collected_Amount == "") {
                $Payment_Collected_Amount = '0';
            } else {
                $Payment_Collected_Amount = $obj->Payment_Collected_Amount;
            }
            if ($obj->ptp_date == "") {
                $ptp_date = 0;
            } else {
                $ptp_date = $obj->ptp_date;
            }

            if ($obj->fos_completed_status == '1') {
                $Payment_Collected_Date = date('d-m-Y H:i:s');
                $fos_completed = '1';
            } else if ($obj->fos_completed_status == '2') {
                $Payment_Collected_Date = "NA";
                $fos_completed = '1';
            } else if ($obj->fos_completed_status == '3') {
                //ptpresheduled
                $Payment_Collected_Date = "NA";
                $fos_submit_date = explode('-', $fos_submit_date);
                $ptp_date = explode('-', $obj->ptp_date);

                $date1 = date_create($fos_submit_date[2] . "-" . $fos_submit_date[1] . "-" . $fos_submit_date[0]);
                $date2 = date_create($ptp_date[2] . "-" . $ptp_date[1] . "-" . $ptp_date[0]);

                $diff = date_diff($date1, $date2);
                $days = $diff->format("%a");

                if ($days > 2) {
                    $fos_completed = '3';
                } else {
                    $fos_completed = '2';
                }
                if($days==0){
                    $obj->fos_completed_status=5;  
                }

                //  $fos_completed = '2';
            } else if ($obj->fos_completed_status == '4') {
                $Payment_Collected_Date = "NA";
                $fos_completed = '1';
            } else if ($obj->fos_completed_status == '6') {
                $Payment_Collected_Date = "NA";
                $fos_completed = '1';
            } else if ($obj->fos_completed_status == '7') {
                $Payment_Collected_Date = "NA";
                $fos_completed = '1';
            } else if ($obj->fos_completed_status == '16') {
                $Payment_Collected_Date = "NA";
                $fos_completed = '1';
            } else if ($obj->fos_completed_status == '10') {
                $Payment_Collected_Date = date('d-m-Y H:i:s');
                $fos_completed = '1';
            } else if ($obj->fos_completed_status == '11') {
                $Payment_Collected_Date = date('d-m-Y H:i:s');
                $fos_completed = '1';
            }


            $applicationdetails = array(
                "fos_completed_status" => $obj->fos_completed_status,
                "fos_completed" => $fos_completed,
                "fos_comment" => $obj->fos_comment,
                "alternetmobileno" => $obj->AlternetMobileNo,
                'ptp_datetime' => $obj->ptp_date,
                "fos_submit_datetime" => date('d-m-Y H:i:s'),
                "Payment_Collected_Amount" => $Payment_Collected_Amount,
                "penal" => $obj->penal,
                "runsheet" => '0',
                "totalamt" => $obj->totalamt,
                "Payment_Collected_Date" => $Payment_Collected_Date, //date('d-m-Y H:i:s'),
                "strIP" => $_SERVER['REMOTE_ADDR'],
            );
            $where = " where applicationid = '" . $obj->applicationid . "' ";

            $applicationdetails_res = $connect->updaterecord($dbconn, 'application', $applicationdetails, $where);


            $userData = array(
                "fosid" => $obj->loginId,
                "appid" => $obj->applicationid,
                "status" => $obj->fos_completed_status,
                "comment" => $obj->fos_comment,
                'ptp_datetime' => $obj->ptp_date,
                "strEntryDate" => date('d-m-Y H:i:s'),
                "strIP" => $_SERVER['REMOTE_ADDR']
            );

            $insert = $connect->insertrecord($dbconn, 'foshistory', $userData);

            if ($applicationdetails_res) {
                $output['message'] = 'added sucessfully';
                $output['success'] = '1';
            } else {
                $output['message'] = 'Not Data Found';
                $output["success"] = '0';
            }
        } else {
            $output['message'] = ' Password Not match';
            $output["success"] = '0';
        }
    } else {

        $output['message'] = 'User  not match';
        $output['success'] = '0';
    }
} else if ($actions == 'fosstatusdropdown') {
    $request_body = @file_get_contents('php://input');
    $obj = json_decode($request_body);
    $md5Has = md5($obj->password);
    $sql = "select * from agencymanager where loginId = '" . $obj->loginId . "' and isDelete='0' and type='FOS' ";
    $result = mysqli_query($dbconn, $sql);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $good_hash = PBKDF2_HASH_ALGORITHM . ":" . PBKDF2_ITERATIONS . ":" . $row['salt'] . ":" . $row['password'];

        if (validate_password($obj->password, $good_hash)) {
            // echo "SELECT * FROM `fosstatusdrropdown`  where isDelete='0'  and  istatus='1'  order by  fosstatusdrropdownid ASC";
            $sql = "SELECT * FROM `fosstatusdrropdown`  where isDelete='0'  and  istatus='1'  order by  fosstatusdrropdownid ASC";
            $result = mysqli_query($dbconn, $sql);
            if (mysqli_num_rows($result) > 0) {
                $data = array("fosstatusdrropdownid" => '0', "status" => 'Select Status ');
                $output['fosstatus'] [] = array_map('utf8_encode', $data);

                while ($roworderdatails_sql = mysqli_fetch_assoc($result)) {
                    $output['fosstatus'] [] = $roworderdatails_sql;
                }
                $output['message'] = 'Data Found';
                $output['success'] = '1';
            } else {
                $output['message'] = 'Not Data Found';
                $output["success"] = '0';
            }
        } else {
            $output['message'] = 'User or Password not match';
            $output['success'] = '0';
        }
    } else {
        $output['message'] = 'User not match';
        $output['success'] = '0';
    }
} else if ($actions == 'count') {

    $request_body = @file_get_contents('php://input');
    $obj = json_decode($request_body);
    $md5Has = md5($obj->password);
    $sql = "select * from agencymanager where loginId = '" . $obj->loginId . "' and isDelete='0' and type='FOS' ";
    $result = mysqli_query($dbconn, $sql);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $good_hash = PBKDF2_HASH_ALGORITHM . ":" . PBKDF2_ITERATIONS . ":" . $row['salt'] . ":" . $row['password'];

        if (validate_password($obj->password, $good_hash)) {

            //$filterstr = "select *  from application WHERE is_assignto_fos='1' and am_accaptance='1' and fosid = '" . $row['agencymanagerid'] . "' and fos_completed='0' ";

            $totalapp = mysqli_query($dbconn, "select count(*) as totalassignapp from application WHERE is_assignto_fos='1' and am_accaptance='1' and fosid = '" . $row['agencymanagerid'] . "' and fos_completed='0' and fos_completed_status='0' and (PTP_Date = '' or ptp_datetime = '') ");
            $totalappcount = mysqli_fetch_assoc($totalapp);
            $countapp = $totalappcount['totalassignapp'];
           //$countapp = '0';

            //$filterstr = "select *  from application WHERE is_assignto_fos='1' and fosid = '" . $row['agencymanagerid'] . "' and fos_completed='1' ";

            $totalcompapp = mysqli_query($dbconn, "select count(*) as completedapp from application WHERE is_assignto_fos='1' and fosid = '" . $row['agencymanagerid'] . "' and fos_completed > '0'  and fos_completed_status NOT IN (3,5,17) ");
            $totalcompletedcount = mysqli_fetch_assoc($totalcompapp);
            $countcompletedapp = $totalcompletedcount['completedapp'];

            $total = mysqli_query($dbconn, "select sum(totalamt) as totalPayment_Collected_Amount from application WHERE is_assignto_fos='1' and fosid = '" . $row['agencymanagerid'] . "' and fos_completed > '0' ");
            $totalCollectedcount = mysqli_fetch_assoc($total);
            if ($totalCollectedcount['totalPayment_Collected_Amount'] == '') {
                $totalCollected = '0';
            } else {
                $totalCollected = $totalCollectedcount['totalPayment_Collected_Amount'];
            }



            $output['totalassignapp'] = $countapp;
            $output['completedapp'] = $countcompletedapp;
            $output['collectedamount'] = $totalCollected;


            $output['message'] = 'sucess';
            $output['success'] = '1';
        } else {
            $output['message'] = 'User or Password not match';
            $output["success"] = '0';
        }
    } else {
        $output['message'] = 'User  not match';
        $output['success'] = '0';
    }
} else if ($actions == 'fosdeshbord') {

    $request_body = @file_get_contents('php://input');
    $obj = json_decode($request_body);
    $md5Has = md5($obj->password);
    $sql = "select * from agencymanager where loginId = '" . $obj->loginId . "' and isDelete='0' and type='FOS' ";
    $result = mysqli_query($dbconn, $sql);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $good_hash = PBKDF2_HASH_ALGORITHM . ":" . PBKDF2_ITERATIONS . ":" . $row['salt'] . ":" . $row['password'];

        if (validate_password($obj->password, $good_hash)) {

            //$filterstr = "select *  from application WHERE is_assignto_fos='1' and am_accaptance='1' and fosid = '" . $row['agencymanagerid'] . "' and fos_completed='0' ";

            $totalapp = "SELECT fosstatusdrropdown.fosstatusdrropdownid,fosstatusdrropdown.status ,IFNULL(application1.statuscount,0) AS StatusCount  FROM  `fosstatusdrropdown`  LEFT JOIN (select count(*) as statuscount,application.fos_completed_status from application where application.fosid = '" . $row['agencymanagerid'] . "' group by application.fos_completed_status) as application1 ON fosstatusdrropdown.fosstatusdrropdownid =  application1.fos_completed_status where fosstatusdrropdown.fosstatusdrropdownid not in (3,17) group by application1.fos_completed_status,fosstatusdrropdown.fosstatusdrropdownid,fosstatusdrropdown.status  ";
            $totalapp .="UNION ALL
            select 5,'PTP For-The-Day',count(*)
            from application where application.fosid = '" . $row['agencymanagerid'] . "'
            and  ((STR_TO_DATE(application.PTP_date,'%d-%m-%Y %T') = '".date('Y-m-d')."'
            and application.PTP_date != '' and fos_completed_status=0) or (STR_TO_DATE(application.ptp_datetime,'%d-%m-%Y %T') = '".date('Y-m-d')."'
            and application.ptp_datetime != '' and fos_completed_status=5)) 
            UNION ALL
            select 3,'PTP Reschdule',count(*)
            from application where application.fosid = '" . $row['agencymanagerid'] . "'
            and  ((STR_TO_DATE(application.PTP_date,'%d-%m-%Y %T') > '".date('Y-m-d')."'
            and application.PTP_date != '' and fos_completed_status=0) or (STR_TO_DATE(application.ptp_datetime,'%d-%m-%Y %T') > '".date('Y-m-d')."'
            and application.ptp_datetime != '' and fos_completed_status=3))
            UNION ALL
            select 17,'Broken PTP',count(*)
            from application where application.fosid = '" . $row['agencymanagerid'] . "'
            and  ((STR_TO_DATE(application.PTP_date,'%d-%m-%Y %T') < '".date('Y-m-d')."'
            and application.PTP_date != '' and fos_completed_status=17) or (STR_TO_DATE(application.ptp_datetime,'%d-%m-%Y %T') < '".date('Y-m-d')."'
            and application.ptp_datetime != '' and fos_completed_status=17))";
            $result1 = mysqli_query($dbconn, $totalapp);
            if (mysqli_num_rows($result1) > 0) {
                while ($row = mysqli_fetch_assoc($result1)) {

                    $output['fosdeshbordcount'] [] = $row;
                }
                $output['message'] = 'Data Found';
                $output['success'] = '1';
            } else {
                $output['message'] = 'Not Data Found';
                $output["success"] = '0';
            }


            // $output['message'] = 'sucess';
            // $output['success'] = '1';
        } else {
            $output['message'] = 'User or Password not match';
            $output["success"] = '0';
        }
    } else {
        $output['message'] = 'User  not match';
        $output['success'] = '0';
    }
} else if ($actions == 'deshbordstatusviselist') {

    $request_body = @file_get_contents('php://input');
    $obj = json_decode($request_body);
    $md5Has = md5($obj->password);
    $sql = "select * from agencymanager where loginId = '" . $obj->loginId . "' and isDelete='0' and type='FOS' ";
    $result = mysqli_query($dbconn, $sql);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $good_hash = PBKDF2_HASH_ALGORITHM . ":" . PBKDF2_ITERATIONS . ":" . $row['salt'] . ":" . $row['password'];

        if (validate_password($obj->password, $good_hash)) {

            if($obj->fosstatusdrropdownid=='5'){
                $filterstr = "select *  from application WHERE  runsheet=0 and  is_assignto_fos='1' and am_accaptance='1' and fosid = '" . $row['agencymanagerid'] . "'  and  ((STR_TO_DATE(PTP_Date,'%d-%m-%Y %H:%i:%s') = '" . date('Y-m-d') . "' and PTP_Date!='' and fos_completed_status IN (0,5)) or (STR_TO_DATE(ptp_datetime,'%d-%m-%Y %H:%i:%s') = '" . date('Y-m-d') . "' and  ptp_datetime!='' and fos_completed_status IN (0,5))) ";
            }else if($obj->fosstatusdrropdownid=='3'){
                $filterstr = "select *  from application WHERE  runsheet=0 and  is_assignto_fos='1' and am_accaptance='1' and fosid = '" . $row['agencymanagerid'] . "'  and  ((STR_TO_DATE(PTP_Date,'%d-%m-%Y %H:%i:%s') > '" . date('Y-m-d') . "' and PTP_Date!='' and fos_completed_status=0) or (STR_TO_DATE(ptp_datetime,'%d-%m-%Y %H:%i:%s') > '" . date('Y-m-d') . "' and ptp_datetime!='' and fos_completed_status=3)) ";
            }else if($obj->fosstatusdrropdownid=='17'){
                $filterstr = "select *  from application WHERE  runsheet=0 and   is_assignto_fos='1' and am_accaptance='1' and fosid = '" . $row['agencymanagerid'] . "'  and  ((STR_TO_DATE(PTP_Date,'%d-%m-%Y %H:%i:%s') < '" . date('Y-m-d') . "' and PTP_Date!='' and fos_completed_status=17) or (STR_TO_DATE(ptp_datetime,'%d-%m-%Y %H:%i:%s') < '" . date('Y-m-d') . "' and ptp_datetime!='' and fos_completed_status=17)) ";
            }else{
            //$filterstr = "select *  from application WHERE    is_assignto_fos='1' and am_accaptance='1' and fosid = '" . $row['agencymanagerid'] . "' and fos_completed_status = '" . $obj->fosstatusdrropdownid . "'  ";
            $filterstr = "select *  from application WHERE    is_assignto_fos='1' and am_accaptance='1' and fosid = '" . $row['agencymanagerid'] . "' and fos_completed_status = '" . $obj->fosstatusdrropdownid . "'  ";
            }
            //echo $filterstr;
            $result1 = mysqli_query($dbconn, $filterstr);
            if (mysqli_num_rows($result1) > 0) {
                while ($row = mysqli_fetch_assoc($result1)) {

                    $output['deshbordstatusviselist'] [] = $row;
                }
                $output['message'] = 'Data Found';
                $output['success'] = '1';
            } else {
                $output['message'] = 'Not Data Found';
                $output["success"] = '0';
            }
        } else {
            $output['message'] = 'User or Password not match';
            $output['success'] = '0';
        }
    } else {
        $output['message'] = 'User  not match';
        $output['success'] = '0';
    }
} else if ($actions == 'runsheetapplication') {

    $request_body = @file_get_contents('php://input');
    $obj = json_decode($request_body);
    $md5Has = md5($obj->password);
    $sql = "select * from agencymanager where loginId = '" . $obj->loginId . "' and isDelete='0' and type='FOS' ";
    $result = mysqli_query($dbconn, $sql);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $good_hash = PBKDF2_HASH_ALGORITHM . ":" . PBKDF2_ITERATIONS . ":" . $row['salt'] . ":" . $row['password'];

        if (validate_password($obj->password, $good_hash)) {

            if ($obj->applicationid == '0') {
                $filterstr = "select *  from application WHERE is_assignto_fos='1' and am_accaptance='1' and fosid = '" . $row['agencymanagerid'] . "'  and runsheet='1' order by runsheetsequnce asc ";
            } else {
                $filterstr = "select *,(select fosstatusdrropdown.status from fosstatusdrropdown WHERE fosstatusdrropdown.fosstatusdrropdownid=application.fos_completed_status)as status  from application WHERE  applicationid='" . $obj->applicationid . "' and  is_assignto_fos='1' and am_accaptance='1' and fosid = '" . $row['agencymanagerid'] . "' and  runsheet='1'  order by runsheetsequnce asc ";
            }
         //   echo $filterstr;
            $result1 = mysqli_query($dbconn, $filterstr);
            if (mysqli_num_rows($result1) > 0) {
                while ($row = mysqli_fetch_assoc($result1)) {

                    $output['runsheetapplicationDetail'] [] = $row;
                }
                $output['message'] = 'Data Found';
                $output['success'] = '1';
            } else {
                $output['message'] = 'Not Data Found';
                $output["success"] = '0';
            }
        } else {
            $output['message'] = 'User or Password not match';
            $output['success'] = '0';
        }
    } else {
        $output['message'] = 'User  not match';
        $output['success'] = '0';
    }
} else if ($actions == 'addtorunsheet') {
//veryfied app
    $request_body = @file_get_contents('php://input');
    $obj = json_decode($request_body);

    $sql = "select * from agencymanager where loginId = '" . $obj->loginId . "' and isDelete='0' and type='FOS' ";
    $result = mysqli_query($dbconn, $sql);
    if (mysqli_num_rows($result) == 1) {

        $row = mysqli_fetch_array($result);
        $good_hash = PBKDF2_HASH_ALGORITHM . ":" . PBKDF2_ITERATIONS . ":" . $row['salt'] . ":" . $row['password'];

        if (validate_password($obj->password, $good_hash)) {

            $applicationdetails = array(
                "runsheet" => '1',
                "strIP" => $_SERVER['REMOTE_ADDR'],
            );
            $where = " where applicationid = '" . $obj->applicationid . "' ";
            
            $applicationdetails_res = $connect->updaterecord($dbconn, 'application', $applicationdetails, $where);

            if ($applicationdetails_res) {
                $output['message'] = 'added sucessfully';
                $output['success'] = '1';
            } else {
                $output['message'] = 'Added Successfully';
                $output["success"] = '1';
            }
        } else {
            $output['message'] = ' Password Not match';
            $output["success"] = '0';
        }
    } else {

        $output['message'] = 'User  not match';
        $output['success'] = '0';
    }
} else if ($actions == 'addmultipalrunsheetsequnce') {

    $request_body = @file_get_contents('php://input');
    $obj = json_decode($request_body);
    //print_r($obj);
    $sql = "select * from agencymanager where loginId = '" . $obj->loginId . "' and isDelete='0' and type='FOS' ";
    $result = mysqli_query($dbconn, $sql);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $good_hash = PBKDF2_HASH_ALGORITHM . ":" . PBKDF2_ITERATIONS . ":" . $row['salt'] . ":" . $row['password'];

        if (validate_password($obj->password, $good_hash)) {

            $obj = json_decode($obj->applicationdetails);
            $count = count($obj);
            for ($iCounter = 0; $iCounter < $count; $iCounter++) {

                $applicationdetails = array(
                    "runsheetsequnce" => $obj[$iCounter]->runsheetsequnce,
                    "strIP" => $_SERVER['REMOTE_ADDR'],
                );
                $where = " where applicationid = '" . $obj[$iCounter]->applicationid . "' ";
                $applicationdetails_res = $connect->updaterecord($dbconn, 'application', $applicationdetails, $where);
            }
            if ($applicationdetails_res) {
                $output['message'] = 'added sucessfully';
                $output['success'] = '1';
            } else {
                $output['message'] = 'Not Data Found';
                $output["success"] = '0';
            }
        } else {
            $output['message'] = 'Password not match';
            $output["success"] = '0';
        }
    } else {
        $output['message'] = 'User or Password not match';
        $output['success'] = '0';
    }
} else if ($actions == 'removefromrunsheet') {
//veryfied app
    $request_body = @file_get_contents('php://input');
    $obj = json_decode($request_body);

    $sql = "select * from agencymanager where loginId = '" . $obj->loginId . "' and isDelete='0' and type='FOS' ";
    $result = mysqli_query($dbconn, $sql);
    if (mysqli_num_rows($result) == 1) {

        $row = mysqli_fetch_array($result);
        $good_hash = PBKDF2_HASH_ALGORITHM . ":" . PBKDF2_ITERATIONS . ":" . $row['salt'] . ":" . $row['password'];

        if (validate_password($obj->password, $good_hash)) {

            $applicationdetails = array(
                "runsheet" => '0',
                "strIP" => $_SERVER['REMOTE_ADDR'],
            );
            $where = " where applicationid = '" . $obj->applicationid . "' ";

            $applicationdetails_res = $connect->updaterecord($dbconn, 'application', $applicationdetails, $where);

            if ($applicationdetails_res) {
                $output['message'] = 'Remove sucessfully';
                $output['success'] = '1';
            } else {
                $output['message'] = 'Not Data Found';
                $output["success"] = '0';
            }
        } else {
            $output['message'] = ' Password Not match';
            $output["success"] = '0';
        }
    } else {

        $output['message'] = 'User  not match';
        $output['success'] = '0';
    }
} else if ($actions == 'serchapplications') {

    $request_body = @file_get_contents('php://input');
    $obj = json_decode($request_body);

    $sql = "select * from agencymanager where loginId = '" . $obj->loginId . "' and isDelete='0' and type='FOS' ";
    $result = mysqli_query($dbconn, $sql);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $good_hash = PBKDF2_HASH_ALGORITHM . ":" . PBKDF2_ITERATIONS . ":" . $row['salt'] . ":" . $row['password'];

        if (validate_password($obj->password, $good_hash)) {

            $where = "where 1=1 ";
            // $where = " where Chassis_no = '" . $obj->prefix . $obj->postfix . "' and applicationID = " . $obj->applicationId . "";
            if ($obj->App_Id != '') {
                $where = $where . "and App_Id = '" . $obj->App_Id . "'  ";
            }
            if ($obj->Customer_Name != '') {
                $where = $where . "and Customer_Name like '" . $obj->Customer_Name . "%'";
            }

            $filterstr = "select *  from application " . $where . " and  is_assignto_fos='1' and am_accaptance='1' and fosid = '" . $row['agencymanagerid'] . "'  ";

            $result1 = mysqli_query($dbconn, $filterstr);
            if (mysqli_num_rows($result1) > 0) {
                while ($row = mysqli_fetch_assoc($result1)) {
                    $output['fosassignapplicationDetail'] [] = $row;
                }
                $output['message'] = 'Data Found';
                $output['success'] = '1';
            } else {
                $output['message'] = 'Not Data Found';
                $output["success"] = '0';
            }
        } else {
            $output['message'] = 'User or Password not match';
            $output['success'] = '0';
        }
    } else {
        $output['message'] = 'User  not match';
        $output['success'] = '0';
    }
} else if ($actions == 'addapplicationphotos') {

    $request_body = @file_get_contents('php://input');
    $obj = json_decode($request_body);

    $applicationid = $_REQUEST['applicationid'];

    $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
    $appid = "select * from application where applicationid = '" . $applicationid . "'   ";
    $appidresult = mysqli_query($dbconn, $appid);
    $appidrow = mysqli_fetch_array($appidresult);

    $file_name = $appidrow['App_Id'] . '_' . time() . '.' . $ext; //$_FILES['image']['name'];

    $data = array(
        "applicationid" => $applicationid,
        "photo" => $file_name,
        "strEntryDate" => date('d-m-Y H:i:s'),
        "strIP" => $_SERVER['REMOTE_ADDR']
    );
    $dealer_res = $connect->insertrecord($dbconn, 'applicationphotos', $data);

    $application = array(
        "is_photo_uploaded" => '1'       
    );
    $where = " where applicationid = '" . $applicationid . "' ";

    $applicationdetails_res = $connect->updaterecord($dbconn, 'application', $application, $where);



    $sql = "select strEntryDate from application where applicationid = '" . $applicationid . "'   ";
    $result = mysqli_query($dbconn, $sql);
    $row = mysqli_fetch_array($result);
    $EntrDate = $row['strEntryDate'];

    $arr = explode(' ', $EntrDate);
    $dateArrar = explode('-', $arr[0]);

    if (!file_exists('../Document/' . $dateArrar[2] . "/")) {

        mkdir('../Document/' . $dateArrar[2], 0777, TRUE);
    }
    if (!file_exists('../Document/' . $dateArrar[2] . "/" . $dateArrar[1])) {

        mkdir('../Document/' . $dateArrar[2] . "/" . $dateArrar[1], 0777, TRUE);
    }
    if (!file_exists('../Document/' . $dateArrar[2] . "/" . $dateArrar[1] . "/" . $dateArrar[0])) {

        mkdir('../Document/' . $dateArrar[2] . "/" . $dateArrar[1] . "/" . $dateArrar[0], 0777, TRUE);
    }

    if (!file_exists('../Document/' . $dateArrar[2] . "/" . $dateArrar[1] . "/" . $dateArrar[0] . "/" . $applicationid . "/")) {

        mkdir('../Document/' . $dateArrar[2] . "/" . $dateArrar[1] . "/" . $dateArrar[0] . "/" . $applicationid, 0777, TRUE);
    }

    $target_path = '../Document/' . $dateArrar[2] . "/" . $dateArrar[1] . "/" . $dateArrar[0] . "/" . $applicationid . "/" . $file_name;

    if (!move_uploaded_file($_FILES['image']['tmp_name'], $target_path)) {
        $output['success'] = "0";
        $output['message'] = 'Could not move the image!';
    } else {
        // $output['imageId'] = $dealer_res;
        $output['message'] = 'sucess';
        $output['success'] = '1';
    }
}
print(json_encode($output));
?>
