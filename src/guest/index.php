<?php
//###### CREATE SESSION IF DOESN'T EXIST ######
if (!isset($_SESSION)) {
	session_start();
}

//######## AUTHENTICATION ########
if (!isset($_SESSION['valid_guest']) || !$_SESSION['valid_guest']) {
	header('location: /login');
}

require '../login/expire.php';
require '../php/parameters.php';
require '../php/functions.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title><? echo $siteName; ?> GUEST</title>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <meta charset="UTF-8" />

        <link href="../admin/css/smoothness/jquery-ui-1.9.2.custom.min.css" rel="stylesheet" type="text/css" media="screen" />
        <link rel="stylesheet" type="text/css" media="screen" href="../admin/elFinder-2.1.6/css/elfinder.min.css" />
        <link href="../admin/css/cms.css" rel="stylesheet" type="text/css" media="screen" />

        <script type="text/javascript" src="../js/jquery-1.11.3.min.js"></script>
        <script type="text/javascript" src="../admin/js/jquery-ui-1.9.2.custom.min.js"></script>
        <script type="text/javascript" src="../admin/elFinder-2.1.6/js/elfinder.min.js"></script>
        <script type="text/javascript" src="../admin/js/cmsConfig.js"></script>
        <script type="text/javascript" src="../admin/js/cmsCommon.js"></script>
    </head>

    <body>

        <div id="main-container">

            <div id="header">

                <div id="header-left-part">
                    <p><? echo $siteName; ?> GUEST</p>
                </div>

                <div id="header-right-part">
                    <a class="logout" href="/login/logout.php?referer=/guest">Logout</a>
                </div>

            </div>


            <div id="columns-container">



                <!--######## PAGE CONTENT #########-->
                <div id="page-content" style="width: 100%; left: 0;">
                    <div id="fm-container" style="margin-top: 10px;"></div>
                </div>

            </div>

        </div>

		<style>
			div.elfinder-workzone div.ui-state-disabled {
				opacity: 1 !important;
			}
		</style>

		<script>
			var topBarHeight = $('#header').height() + 30;


			var elf = $('#fm-container').elfinder({
				url: '../admin/' + CmsConfig.elfinderGuestConnector,
				width: '99%',
				height: $(window).height() - topBarHeight,
				resizable: false,
				uiOptions: CmsConfig.elfinderUiOptions
			});

			$(window).resize(function () {
				elf.height($(window).height() - topBarHeight);
			});
		</script>

    </body>

</html>