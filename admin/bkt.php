<?php
ob_start();
error_reporting(E_ALL);
include_once '../common.php';
$connect = new connect();
include('IsLogin.php');
?>
<!DOCTYPE html>

<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title><?php echo $ProjectName; ?> |  BKT </title>
        <?php include_once './include.php'; ?>
    </head>
    <body class="page-container-bg-solid page-boxed">
        <?php include_once './header.php'; ?>
        <div style="display: none; z-index: 10060;" id="loading">
            <img id="loading-image" src="<?php echo $web_url;?>admin/images/loader1.gif">
        </div>
        <div class="page-container">        
            <div class="page-content-wrapper">
             
                <div class="page-content">
                    <div class="container">
                        <ul class="page-breadcrumb breadcrumb">
                            <li>
                                <a href="<?php echo $web_url;?>admin/index.php">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>

                            <li>
                                <span>BKT</span>
                            </li>
                        </ul>

                        <div class="page-content-inner">

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="portlet light ">
                                        <div class="portlet-title">
                                            <div class="caption font-red-sunglo">
                                                <i class="icon-settings font-red-sunglo"></i>
                                                <span class="caption-subject bold uppercase" id="BKT">Add BKT</span>
                                            </div>
                                        </div>
                                        <div class="portlet-body form">
                                            <form  role="form"  method="POST"  action="" name="frmparameter"  id="frmparameter" enctype="multipart/form-data">
                                                <input type="hidden" value="AddBKT" name="action" id="action">
                                                <div class="form-body">
                                                    <div class="row">
                                                        <div class="style-msg  errormsg col_half">
                                                            <div class="alert alert-success" id="errorDIV" style="display: none;"></div>
                                                        </div>
                                                        <div class="col_half col_last">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="form_control_1">BKT Name</label>
                                                        <input name="BKTname" id="BKTname"  class="form-control" placeholder="Enter BKT Name" required="" type="text">
                                                    </div>

                                                </div>

                                                <div class="form-actions noborder">
                                                    <input class="btn blue margin-top-20" type="submit" id="Btnmybtn"  value="Submit" name="submit">      
                                                    <button type="button" class="btn blue margin-top-20" onClick="checkclose();">Cancel</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-8">
                                    <div class="portlet light ">
                                        <div class="portlet-title">
                                            <div class="caption font-red-sunglo">
                                                <i class="icon-settings font-red-sunglo"></i>
                                                <span class="caption-subject bold uppercase">List of Product</span>
                                            </div>
                                        </div>
                                        <div class="portlet-body form">
                                            <div class="col-md-6 pull-right">
                                                <form  role="form"  method="POST"  action="" name="frmSearch"  id="frmSearch" enctype="multipart/form-data">
                                                    <div class="form-group col-md-9">
                                                        <input type="text" value="" name="Search_Txt" class="form-control" id="Search_Txt" placeholder="Search BKT Name " required/>

                                                    </div>
                                                    <div class="form-actions  col-md-3">
                                                        <a href="#" class="btn blue pull-right" onclick="PageLoadData(1);">Search</a>
                                                    </div>
                                                </form>
                                            </div>
                                            <div id="PlaceUsersDataHere">

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include_once './footer.php'; ?>
        <script type="text/javascript">




            function checkclose() {
                window.location.href = '';
            }



            $('#frmparameter').submit(function (e) {

                e.preventDefault();
                var $form = $(this);
                $('#loading').css("display", "block");
                $.ajax({
                    type: 'POST',
                    url: '<?php echo $web_url;?>admin/querydata.php',
                    data: $('#frmparameter').serialize(),
                    success: function (response) {
                        console.log(response);
                        //$("#Btnmybtn").attr('disabled', 'disabled');
                        if (response == 1)
                        {
                            $('#loading').css("display", "none");
                            $("#Btnmybtn").attr('disabled', 'disabled');
                            alert(' Added Sucessfully.');
                            window.location.href = '';
                        } else if (response == 2)
                        {
                            $('#loading').css("display", "none");
                            $("#Btnmybtn").attr('disabled', 'disabled');
                            alert(' Edited Sucessfully.');
                            window.location.href = '';
                        } else
                        {
                            $('#loading').css("display", "none");
                            $("#Btnmybtn").attr('disabled', 'disabled');
                            alert('Invalid Request.');

                            window.location.href = '';
                        }
                    }

                });
            });


            function setEditdata(id)
            {

                $('#errorDIV').css('display', 'none');
                $('#errorDIV').html('');
                $('#loading').css("display", "block");
                $.ajax({
                    type: 'POST',
                    url: '<?php echo $web_url;?>admin/querydata.php',
                    data: {action: "GetAdminBKT", ID: id},
                    success: function (response) {
                        document.getElementById("BKT").innerHTML = "EDIT BKT";
                        $('#loading').css("display", "none");
                        var json = JSON.parse(response);
                        
                        $('#BKTname').val(json.bktname);
                        $('#action').val('EditBKT');
                        $('<input>').attr('type', 'hidden').attr('name', 'bktid').attr('value', json.bktid).attr('id', 'bktid').appendTo('#frmparameter');
                    }
                });
            }




            function deletedata(task, id)
            {

                var errMsg = '';
                if (task == 'Delete') {
                    errMsg = 'Are you sure to delete?';
                }
                if (confirm(errMsg)) {
                    $('#loading').css("display", "block");
                    $.ajax({
                        type: "POST",
                        url: "<?php echo $web_url;?>admin/Ajaxbkt.php",
                        data: {action: task, ID: id},
                        success: function (msg) {

                            $('#loading').css("display", "none");
                            window.location.href = '';

                            return false;
                        },
                    });
                }
                return false;
            }
            function PageLoadData(Page) {
                var Search_Txt = $('#Search_Txt').val();
                $('#loading').css("display", "block");
                $.ajax({
                    type: "POST",
                    url: "<?php echo $web_url;?>admin/Ajaxbkt.php",
                    data: {action: 'ListUser', Page: Page, Search_Txt: Search_Txt},
                    success: function (msg) {

                        $("#PlaceUsersDataHere").html(msg);
                        $('#loading').css("display", "none");
                    },
                });
            }// end of filter
            PageLoadData(1);



        </script>
    </body>
</html>