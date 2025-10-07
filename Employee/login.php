<?php
ob_start();
include ('../config.php');
include ('password_hash.php');
$message = "";
if (isset($_POST['btnsubmit']) && isset($_POST['loginId']) && !empty($_POST['loginId'])) {
    $strlogin = "select * from centralmanager where loginId = '" . trim($_POST['loginId']) . "' and  istatus=1 and isDelete=0";

    $result = mysqli_query($dbconn, $strlogin);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        $_SESSION['LastLoginEmployee'] = $row['LastLogin'];
        $updatelast = "UPDATE `centralmanager` SET `LastLogin` = '" . date('d-m-y H:i:s') . "' WHERE  `loginId` ='" . trim($_POST['loginId']) . "'";
        mysqli_query($dbconn, $updatelast);
        $good_hash = PBKDF2_HASH_ALGORITHM . ":" . PBKDF2_ITERATIONS . ":" . $row['salt'] . ":" . $row['password'];
        if (validate_password($_REQUEST['password'], $good_hash)) {

            $_SESSION['centralmanagerid'] = $row['centralmanagerid'];
            $_SESSION['loginId'] = $row['loginId'];
            $_SESSION['employeeName'] = $row['employeeName'];
            $_SESSION['Type'] = "Central Manager"; //$_POST['Type'];
            $_SESSION['centralmanager'] = $row;

            echo "<script>window.location.href='" . $web_url . "Employee/index.php';</script>";
        } else {
            header('location:' . $web_url . 'Employee/login.php?flg=1');
            // $message = "UserName or password does't match.";
        }
    } else {

        $strlogin = "select * from agencymanager where loginId='" . trim($_POST['loginId']) . "' and  istatus=1 and isDelete=0 and type='Agency Manager' ";

        $result = mysqli_query($dbconn, $strlogin);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $_SESSION['LastLoginEmployee'] = $row['LastLogin'];
            $updatelast = "UPDATE `agencymanager` SET `LastLogin` = '" . date('d-m-Y H:i:s') . "' WHERE  `loginId` ='" . trim($_POST['loginId']) . "'";
            mysqli_query($dbconn, $updatelast);
            $good_hash = PBKDF2_HASH_ALGORITHM . ":" . PBKDF2_ITERATIONS . ":" . $row['salt'] . ":" . $row['password'];
            if (validate_password($_REQUEST['password'], $good_hash)) {
                $_SESSION['agencymanagerid'] = $row['agencymanagerid'];
                $_SESSION['agencyname'] = $row['agencyname'];
                $_SESSION['employeename'] = $row['employeename'];
                $_SESSION['loginId'] = $row['loginId'];
                $_SESSION['Type'] = "Agency Manager"; //$_POST['Type'];
                $_SESSION['agencymanager'] = $row;
                echo "<script>window.location.href='" . $web_url . "Employee/index.php';</script>";
            } else {
                header('location:' . $web_url . 'Employee/login.php?flg=1');
                // $message = "UserName or password does't match.";
            }
        } else {
            $strlogin = "select * from agencymanager where  loginId='" . trim($_POST['loginId']) . "'  and  istatus=1 and isDelete=0 and type='Agency supervisor'  ";

            $result = mysqli_query($dbconn, $strlogin);
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_array($result);
                $_SESSION['LastLoginEmployee'] = $row['LastLogin'];
                $updatelast = "UPDATE `agencymanager` SET `LastLogin` = '" . date('d-m-Y H:i:s') . "' WHERE  `loginId` ='" . trim($_POST['loginId']) . "'";
                mysqli_query($dbconn, $updatelast);
                $good_hash = PBKDF2_HASH_ALGORITHM . ":" . PBKDF2_ITERATIONS . ":" . $row['salt'] . ":" . $row['password'];
                if (validate_password($_REQUEST['password'], $good_hash)) {
                    $_SESSION['agencysupervisorid'] = $row['agencymanagerid'];  
                    $_SESSION['agencyname'] = $row['agencyname'];
                    $_SESSION['employeename'] = $row['employeename'];
                    $_SESSION['loginId'] = $row['loginId'];
                    $_SESSION['Type'] = "Agency supervisor"; //$_POST['Type'];
                    $_SESSION['agencysupervisor'] = $row;

                    echo "<script>window.location.href='" . $web_url . "Employee/index.php';</script>";
                } else {
                    header('location:' . $web_url . 'Employee/login.php?flg=1');
                    // $message = "UserName or password does't match.";
                }
            } else {

                $strlogin = "select * from companyemployee where  loginid='" . trim($_POST['loginId']) . "'  and  istatus=1 and isDelete=0  ";

                $result = mysqli_query($dbconn, $strlogin);
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_array($result);
                    
                    $good_hash = PBKDF2_HASH_ALGORITHM . ":" . PBKDF2_ITERATIONS . ":" . $row['salt'] . ":" . $row['password'];
                    if (validate_password($_REQUEST['password'], $good_hash)) {
                        $_SESSION['companyemployeeid'] = $row['companyemployeeid'];
                        $_SESSION['name'] = $row['name'];
                        $_SESSION['loginid'] = $row['loginid'];                     
                        $_SESSION['companyemployee'] = $row;
                         $_SESSION['Type'] = "Company Employee";
                        echo "<script>window.location.href='" . $web_url . "Employee/index.php';</script>";
                    } else {
                        header('location:' . $web_url . 'Employee/login.php?flg=1');
                        // $message = "UserName or password does't match.";
                    }
                    // header('location:' . $web_url . 'Employee/login.php?flg=2');
                } else {
                    header('location:' . $web_url . 'Employee/login.php?flg=2');
                }
            }
            }
        }
    }
    ?>
    <html lang="en">

        <head>
            <meta charset="utf-8" />
            <title>Login</title>
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta content="width=device-width, initial-scale=1" name="viewport" />
            <meta content="" name="description" />
            <meta content="" name="author" />

            <link href="//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
            <link href="<?php echo $web_url; ?>Employee/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

            <link href="<?php echo $web_url; ?>Employee/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

            <link href="<?php echo $web_url; ?>Employee/assets/pages/css/login.css" rel="stylesheet" type="text/css" />
            <link rel="shortcut icon" href="favicon.ico" /> 
        </head>


        <body class=" login">
            <div class="menu-toggler sidebar-toggler"></div>
            <!-- END SIDEBAR TOGGLER BUTTON -->
            <!-- BEGIN LOGO -->
            <div class="logo container-fluid">
                <!--<div class="col-md-4"></div>-->
                <div class="col-md-4">
                    <a href="<?php echo $web_url; ?>Employee/index.php" >
                        <img src="<?php echo $web_url; ?>Employee/assets/images/logo.png" alt="" style="width: 150px;" />
                    </a>
                </div>
                <div class="col-md-4"></div>
                <!--<div class="col-md-4">-->
                <!--    <img src="../images/herofincorp.png" alt="" style="width: 100px;" />-->
                <!--</div>-->
                <div class="col-md-4">
                    <img src="../images/CREDSURE_LOGO_PNG-01.png" alt="" style="width: 150px;margin-top: 12px;" />
                </div>
            </div>
            <!-- END LOGO -->
            <!-- BEGIN LOGIN -->
            <div class="content">
                <!-- BEGIN LOGIN FORM -->
                <form class="login-form" action="" method="post"  >
                    <h3 class="form-title font-blue uppercase">Sign In</h3>
                    <!--                <div class="alert alert-danger display-hide">-->
                    <!--                    <button class="close" data-close="alert"></button>-->
                    <?php
                    if (isset($_GET['flg'])) {

                        if ($_GET['flg'] == 1)
                            echo "<div class='alert alert-danger display-hide'><span>Login ID  or password does't match.</span> </div>";
                        else if ($_GET['flg'] == 2)
                            echo '<div class="alert alert-danger display-hide"><span><label>Login ID not Registered.</span> </div>';
                    }
                    ?> 
                    <div class="form-group">
                        <label class="control-label visible-ie8 visible-ie9">Login Id</label>
                        <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Enter The Login Id." name="loginId" id="loginId" value="" required=""/>
                    </div>
                    <div class="form-group">
                        <label class="control-label visible-ie8 visible-ie9">Password</label>
                        <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Enter The Password" name="password" id="password" value="" required=""/>
                    </div>
                    <!--                <div class="form-group">
                                        <label class="control-label visible-ie8 visible-ie9">Type</label>
                                        <select name="Type" id="Type"  class="form-control form-control-solid placeholder-no-fix" required="">
                                            <option value="">Select Type</option>
                                            <option value="Company Employee">Company Employee</option>
                                            <option value="Location Employee">Location Employee</option>
                                            <option value="Admin Employee">Admin Employee</option>
                                        </select>
                                    </div>-->
                    <div class="form-actions">
                        <input type="submit"  name="btnsubmit" id="btnsubmit" value="Login" class="btn btn-success uppercase col-md-12" />
                    </div>

                </form>
                <!-- END LOGIN FORM -->

            </div>
            <div class="copyright">  </div>

            <script>
                $('.input').keypress(function (e) {
                    if (e.which == 13) {
                        $('.login-form').submit();
                        return false;
                    } else
                    {
                        alert('in else');
                    }
                });
            </script>
            <script src="<?php echo $web_url; ?>Employee/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
            <script src="<?php echo $web_url; ?>Employee/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

            <script src="<?php echo $web_url; ?>Employee/assets/global/scripts/app.js" type="text/javascript"></script>
            <script src="<?php echo $web_url; ?>Employee/assets/pages/scripts/login.js" type="text/javascript"></script>


    </body>

</html>