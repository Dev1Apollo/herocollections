<?php
$MasterEntry = array("State.php", "Location.php","agency.php","product.php","bkt.php");
?>
<div class="page-header">
    <div class="page-header-top">
        <div class="container">
            <div class="page-logo">
                <a href="<?php echo $web_url; ?>admin/index.php">
                    <img src="<?php echo $web_url; ?>admin/assets/images/logo.png" width="145px" alt="logo" class="logo-default">
                </a>
            </div>
            <a href="javascript:;" class="menu-toggler"></a>
            <div class="pull-right">
                
                <!--<img src="../images/herofincorp.png" width="100px" style="margin: 5px 0" alt="logo" class="logo-default">-->
                <img src="../images/CREDSURE_LOGO_PNG-01.png" width="100px" style="margin: 5px 0" alt="logo" class="logo-default">
                
            </div>
        </div>
    </div>
    <div class="page-header-menu">
        <div class="menu_main">
            <div class="hor-menu">
                <ul class="nav navbar-nav">
                    <?php
                    if (isset($_SESSION['AdminName'])) {
                        if ($_SESSION['AdminType'] == 1) {
                            ?>

                            <li class="menu-dropdown classic-menu-dropdown <?php
                            if (in_array(basename($_SERVER['REQUEST_URI']), $MasterEntry)) {
                                echo
                                'active';
                            }
                            ?>">
                                <a href="#">Master Entry</a>
                                <ul class="dropdown-menu pull-left">

<!--                                    <li>
                                        <a href="<?php echo $web_url; ?>admin/district.php" class="nav-link">
                                            District
                                        </a>
                                    </li>-->
                                    <li>
                                        <a href="<?php echo $web_url; ?>admin/State.php" class="nav-link">
                                            State
                                        </a>
                                    </li>

                                    <li>
                                        <a href="<?php echo $web_url; ?>admin/Location.php" class="nav-link">
                                          Branch  <!--Location-->
                                        </a>
                                    </li>   
                                    
                                       <li>
                                        <a href="<?php echo $web_url; ?>admin/ExcelFormMaster.php" class="nav-link">
                                            Excel Form Master
                                        </a>
                                    </li>
                                    
                                    
                                       <li>
                                        <a href="<?php echo $web_url; ?>admin/agency.php" class="nav-link">
                                            Agency 
                                        </a>
                                    </li>
                                       <li>
                                        <a href="<?php echo $web_url; ?>admin/product.php" class="nav-link">
                                            Product 
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo $web_url; ?>admin/bkt.php" class="nav-link">
                                            BKT 
                                        </a>
                                    </li>
                                    
                                </ul>
                            </li>
                            <li class="menu-dropdown classic-menu-dropdown  <?php
                            if (basename($_SERVER['REQUEST_URI']) == 'centralmanager.php') {
                                echo 'active';
                            }
                            ?>">
                                <a href="<?php echo $web_url; ?>admin/centralmanager.php">Central Manager</a>
                            </li>
                            <li class="menu-dropdown classic-menu-dropdown  <?php
                                if (basename($_SERVER['REQUEST_URI']) == 'agencymanager.php') {
                                    echo 'active';
                                }
                                ?>">
                                <a href="<?php echo $web_url; ?>admin/agencymanager.php">Agency User </a>
                            </li>
                               <li class="menu-dropdown classic-menu-dropdown  <?php
                                if (basename($_SERVER['REQUEST_URI']) == 'companyemployee.php') {
                                    echo 'active';
                                }
                                ?>">
                                <a href="<?php echo $web_url; ?>admin/companyemployee.php">Company Employee </a>
                            </li>
                            
                              <li class="menu-dropdown classic-menu-dropdown  <?php
                                if (basename($_SERVER['REQUEST_URI']) == 'assigncase.php') {
                                    echo 'active';
                                }
                                ?>">
                                <a href="<?php echo $web_url; ?>admin/assigncase.php">Archive Case </a>
                            </li>
                            
                             <li class="menu-dropdown classic-menu-dropdown  <?php
                                if (basename($_SERVER['REQUEST_URI']) == 'sercheditcase.php') {
                                    echo 'active';
                                }
                                ?>">
                                <a href="<?php echo $web_url; ?>admin/sercheditcase.php">Assign Case </a>
                            </li>
                              <li class="menu-dropdown classic-menu-dropdown  <?php
                                if (basename($_SERVER['REQUEST_URI']) == 'sercheditcustomercity.php') {
                                    echo 'active';
                                }
                                ?>">
                                <a href="<?php echo $web_url; ?>admin/sercheditcustomercity.php">Edit Coustomer City </a>
                            </li>
                             <li class="menu-dropdown classic-menu-dropdown  <?php
                                if (basename($_SERVER['REQUEST_URI']) == 'downloadimages.php') {
                                    echo 'active';
                                }
                                ?>">
                                <a href="<?php echo $web_url; ?>admin/downloadimages.php">Download Images</a>
                            </li>
                            


                            <?php
                        }
                    }
                    ?>
                </ul>
            </div>
            <div class="hor-menu pull-right">
                <ul class="nav navbar-nav">
                    <li class="menu-dropdown classic-menu-dropdown active">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <i class="fa fa-user"></i>
                            <span class="username username-hide-mobile"><?php echo $_SESSION['AdminName']; ?></span>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <li>
                                <a href="<?php echo $web_url; ?>admin/ChangePassword.php">
                                    <i class="icon-lock"></i>Change Password 
                                </a>
                            </li>

                            <li>
                                <a href="<?php echo $web_url; ?>admin/Logout.php">
                                    <i class="icon-key"></i>Log Out 
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

