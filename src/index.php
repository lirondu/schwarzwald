<?php
require './php/functions.php';

$underConstState = GetUnderConstructionState();

if ($underConstState == '1') {
    include 'under_const/under_const.html';
    die();
}


$displayType       = (isset($_GET['type'])) ? $_GET['type'] : 'menu-page';
$table             = (isset($_GET['table'])) ? $_GET['table'] : '';
$id                = (isset($_GET['id'])) ? $_GET['id'] : '1';
$allPublishedPages = GetPublishedPages();
$socialLinks       = GetSocialLinks();
$metaData          = GetMetaData();
$currentPage       = '0';
$pageType          = '0';
$activeMenuPage    = ($displayType == 'post') ? '2' : $id;


if ($displayType == 'menu-page') {
    $currentPage = GetSinglePage($id);
    $pageType    = $currentPage['type'];
}


// if ($lang != 'en' && $lang != 'de') {
//     die();
// }
?>
<!DOCTYPE html>
<html>

    <head>
        <title><? echo $metaData['title']; ?></title>
		<meta charset="UTF-8">
        <meta name="description" content="<? echo $metaData['description']; ?>" />
        <meta name="keywords" content="<? echo $metaData['keywords']; ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" type="image/jpg" href="css/favicon.jpg" />

        <!-- LOAD CSS BEFORE EVERYTHING ELSE -->
        <link rel="stylesheet" type="text/css" href="css/common.css" />
        <script type="text/javascript" src="js/perDeviceStyle.js"></script>
        <link rel="stylesheet" type="text/css" href="baguettebox/baguetteBox.min.css" />
        <link rel="stylesheet" type="text/css" href="css/baguetteBoxCustom.css" />
    </head>

    <body>
        <div id="page-container" class="page-container">

            <ul id="page-menu">
                <?
                foreach ($allPublishedPages as $key => $val) {
                    ?>
                    <li>
						<?
						if ($val['id'] == '1') {
							?>
							<a href="/">
                            	<? echo $val['title_en']; ?>
                        	</a>
							<?
						} else {
							?>
                        	<a href="index.php?id=<? echo $val['id']; ?>">
                        	    <? echo $val['title_en']; ?>
                        	</a>
							<?
						}
						?>
                        <input type="hidden" id="menu-page-id" value="<? echo $val['id']; ?>" />
                    </li>
                    <?
                }
                ?>
            </ul>


            <div id="page-content">
                <div id="content-divider"></div>

                <?
                if ($displayType == 'menu-page') {
                    if ($currentPage['type'] == $pageTypesMap['HomePage']) {
                        include './php/home.php';
                    } else if ($currentPage['type'] == $pageTypesMap['PostsPage']) {
                        include './php/posts-list.php';
                    } else if ($currentPage['type'] == $pageTypesMap['AboutPage']) {
                        echo $currentPage['content_en'];
                        include './php/about.php';
                    } else if ($currentPage['type'] == $pageTypesMap['PublicationsPage']) {
                        include './php/publications.php';
                    } else {
                        echo $currentPage['content_en'];
                    }
                } else if ($displayType == 'post') {
                    include './php/post-page.php';
                }
                ?>
            </div>
        </div>

        <input type="hidden" id="active-menu-page" value="<? echo $activeMenuPage ?>" />


        <script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
        <script type="text/javascript" src="baguettebox/baguetteBox.min.js"></script>
        <script type="text/javascript" src="js/site.js"></script>
        <script type="text/javascript" src="js/perDeviceJs.js"></script>
    </body>

</html>