<?php
//###### CREATE SESSION IF DOESN'T EXIST ######
if (!isset($_SESSION)) {
	session_start();
}

//######## AUTHENTICATION ########
if (!isset($_SESSION['valid_admin']) || !$_SESSION['valid_admin']) {
	$_SESSION['LOGIN_FWD_URI'] = $_SERVER['REQUEST_URI'];
	header('location: /login');
}

$page_name = (isset($_GET['page-name'])) ? $_GET['page-name'] : 'manage-main-pages';
$_SESSION['referer'] = "/admin/index.php?page-name=$page_name";

require "../login/expire.php";
require '../php/parameters.php';
require '../php/functions.php';

?>
<!DOCTYPE html>
<html>
    <head>
        <title><? echo $siteName; ?> ADMIN</title>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <meta charset="UTF-8" />
		<link rel="icon" type="image/jpg" href="../css/favicon.jpg" />

        <link href="css/smoothness/jquery-ui-1.9.2.custom.min.css" rel="stylesheet" type="text/css" media="screen" />
        <link rel="stylesheet" type="text/css" media="screen" href="elFinder-2.1.6/css/elfinder.min.css" />
        <link href="css/cms.css" rel="stylesheet" type="text/css" media="screen" />

        <script type="text/javascript" src="../js/jquery-1.11.3.min.js"></script>
        <script type="text/javascript" src="js/jquery-ui-1.9.2.custom.min.js"></script>
        <script type="text/javascript" src="js/jquery.validate.min.js"></script>
        <script type="text/javascript" src="elFinder-2.1.6/js/elfinder.min.js"></script>
        <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
        <script type="text/javascript" src="ckeditor/adapters/jquery.js"></script>
        <script type="text/javascript" src="js/cmsConfig.js"></script>
        <script type="text/javascript" src="js/cmsCommon.js"></script>
    </head>

    <body>

        <div id="main-container">

            <div id="header">

                <div id="header-left-part">
                    <p><? echo $siteName; ?> Admin</p>
                </div>

                <div id="header-right-part">
                    <a id="show-menu-button" href="javascript:void(0);" custom-folded="false"></a>

					<?
					if ($page_name == 'manage-main-pages') {
						?>
						<span class="toggler" >
							Under Construction: 
							<?
							if (getUnderConstruction() == '1') {
								echo '<input type="checkbox" class="construction-toggle" name="construction-toggle" checked="checked" />';
							} else {
								echo '<input type="checkbox" class="construction-toggle" name="construction-toggle" />';
							}
							?>
						</span>
						<?
					}
					?>
                    <p></p>
                    <a class="view-site" href="../" target="_blank">View Site</a>
                    <a class="logout" href="/login/logout.php">Logout</a>
                </div>

            </div>


            <div id="columns-container">

                <div id="side-menu">

					<?php require './php/side-bar.php'; ?>

                </div>

                <!--######## PAGE CONTENT #########-->
                <div id="page-content">
					<?php require './php/'.$page_name . '.php'; ?>
                </div>

            </div>

        </div>


        <div id="ok-message-box" class="ui-corner-all">DONE</div>
        <div id="error-message-box" class="ui-corner-all">Something went wrong..<br>Please try to refresh the page...</div>
        <div id="message-dialog"></div>

    </body>

</html>