<?php

$DB_CON = mysqli_connect("localhost", "root", "", "cs_main");
//$DB_CON = mysqli_connect("localhost", "lirondug_dev1", "Password123!", "lirondug_devsite1");

mysqli_set_charset($DB_CON, "utf8");


$pageTypesMap = [
	"HomePage" => '0',
	"TextPage" => '1',
	"PostsPage" => '2',
	"AboutPage" => '3',
	"PublicationsPage" => '4'
];


function GetPublishedPages() {
	global $DB_CON;
	$result = mysqli_query($DB_CON, "SELECT * FROM `pages` WHERE `published`='1' ORDER BY `position`");

	while ($row = mysqli_fetch_assoc($result)) {
		$pages[] = $row;
	}

	return $pages;
}


function GetSinglePage($id) {
	global $DB_CON;
	$result = mysqli_query($DB_CON, "SELECT * FROM `pages` WHERE `id`='$id' LIMIT 1");

	$page = mysqli_fetch_assoc($result);

	return $page;
}


function GetPublishedWorkPosts($postsTable) {
	global $DB_CON;
	$result = mysqli_query($DB_CON, "SELECT * FROM `$postsTable` WHERE `published`='1' ORDER BY `position`");

	while ($row = mysqli_fetch_assoc($result)) {
		$posts[] = $row;
	}

	return $posts;
}


function GetSinglePost($postsTable, $id) {
	global $DB_CON;
	$result = mysqli_query($DB_CON, "SELECT * FROM `$postsTable` WHERE `id`='$id' LIMIT 1");

	$post = mysqli_fetch_assoc($result);

	return $post;
}


function GetHomePageWorkPosts() {
	global $DB_CON;
	$result = mysqli_query($DB_CON, "SELECT * FROM `work_posts` WHERE `published`='1' AND `show_on_home`='1'
								ORDER BY `home_position`");

	while ($row = mysqli_fetch_assoc($result)) {
		$posts[] = $row;
	}

	return $posts;
}


function GetAboutAwardsPublished() {
	global $DB_CON;
	$result = mysqli_query($DB_CON, "SELECT * FROM `about_awards` WHERE `published`='1' ORDER BY `position`");

	while ($row = mysqli_fetch_assoc($result)) {
		$posts[] = $row;
	}

	return $posts;
}


function GetPublicationsPublished() {
	global $DB_CON;
	$result = mysqli_query($DB_CON, "SELECT * FROM `publications` WHERE `published`='1' ORDER BY `position`");

	while ($row = mysqli_fetch_assoc($result)) {
		$posts[] = $row;
	}

	return $posts;
}


function GetAllPublications() {
	global $DB_CON;
	$result = mysqli_query($DB_CON, "SELECT * FROM `publications` ORDER BY `position`");

	while ($row = mysqli_fetch_assoc($result)) {
		$posts[] = $row;
	}

	return $posts;
}


function GetSinglePublication($id) {
	global $DB_CON;
	$result = mysqli_query($DB_CON, "SELECT * FROM `publications` WHERE `id`='$id' LIMIT 1");

	$pub = mysqli_fetch_assoc($result);

	return $pub;
}


function ReplaceLanguage($lang) {
	$urlHasLang = preg_match("/lang=\w{2}/", $_SERVER['REQUEST_URI']);

	if ($urlHasLang) {
		return preg_replace("/([?&]lang=)(\w{2})/", "$1$lang", $_SERVER['REQUEST_URI']);
	} else {
		$urlHasGet = preg_match("/\?/", $_SERVER['REQUEST_URI']);

		if ($urlHasGet) {
			return $_SERVER['REQUEST_URI'] . '&lang=' . $lang;
		} else {
			return $_SERVER['REQUEST_URI'] . '?lang=' . $lang;
		}
	}
}


function GetSocialLinks() {
	global $DB_CON;

	$result = mysqli_query($DB_CON, "SELECT * FROM `social_links`");

	while ($row = mysqli_fetch_assoc($result)) {
		$links[] = $row;
	}

	return $links;
}


function GetMetaData() {
	global $DB_CON;
	$result = mysqli_query($DB_CON, "SELECT * FROM `meta_data` LIMIT 1");

	$meta = mysqli_fetch_assoc($result);

	return $meta;
}


function GetUnderConstructionState() {
	global $DB_CON;
	$result = mysqli_query($DB_CON, "SELECT `state` FROM `under_construction` LIMIT 1");

	$state = mysqli_fetch_assoc($result);

	return $state['state'];
}

/* CMS */


function IsValidCmsAdminLogin($user, $pwd) {
	global $DB_CON;

	$result = mysqli_query($DB_CON, "SELECT * FROM `cms_users` WHERE `priviliged`='1'");

	while ($row = mysqli_fetch_assoc($result)) {
		$users[] = $row;
	}

	foreach ($users as $value) {
		if ($value['uname'] != $user) {
			continue;
		}

		if ($value['passwd'] != $pwd) {
			return false;
		}

		return true;
	}

	return false;
}


function IsValidCmsGuestLogin($user, $pwd) {
	global $DB_CON;

	$result = mysqli_query($DB_CON, "SELECT * FROM `cms_users` WHERE `priviliged`='0'");

	while ($row = mysqli_fetch_assoc($result)) {
		$users[] = $row;
	}

	foreach ($users as $value) {
		if ($value['uname'] != $user) {
			continue;
		}

		if ($value['passwd'] != $pwd) {
			return false;
		}

		return true;
	}

	return false;
}


function getUnderConstruction() {
	global $DB_CON;

	$result = mysqli_query($DB_CON, "SELECT `state` FROM `under_construction` LIMIT 1");

	$data = mysqli_fetch_assoc($result);

	return $data['state'];
}


function setUnderConstruction($state) {
	global $DB_CON;

	$result = mysqli_query($DB_CON, "UPDATE `under_construction` SET `state`='$state' LIMIT 1");

	echo ($result) ? '1' : '0';
}


function GetAllPages() {
	global $DB_CON;
	$result = mysqli_query($DB_CON, "SELECT * FROM `pages` ORDER BY `position`");

	while ($row = mysqli_fetch_assoc($result)) {
		$pages[] = $row;
	}

	return $pages;
}


function GetNextMenuPosition() {
	global $DB_CON;
	$result	 = mysqli_query($DB_CON, "SELECT `position` FROM `pages` ORDER BY `position` DESC LIMIT 1");
	$row	 = mysqli_fetch_assoc($result);
	$count	 = $row['position'] + 1;
	return $count;
}


function GetAboutExhibitionsYears() {
	global $DB_CON;

	$yearsArray = [];

	$q = mysqli_query($DB_CON, "SELECT `year` FROM `about_exhibitions` ORDER BY `year` DESC");

	while ($row = mysqli_fetch_assoc($q)) {
		if (!in_array($row['year'], $yearsArray)) {
			$yearsArray[] = $row['year'];
		}
	}

	return $yearsArray;
}


function GetAboutExhibitions($year) {
	global $DB_CON;

	$exhibArray = [];

	$q = mysqli_query($DB_CON, "SELECT * FROM `about_exhibitions` WHERE `year`='$year' ORDER BY `position` DESC");

	while ($row = mysqli_fetch_assoc($q)) {
		$exhibArray[] = $row;
	}

	return $exhibArray;
}


function GetAboutAwardsByPos() {
	global $DB_CON;
	$result = mysqli_query($DB_CON, "SELECT * FROM `about_awards` ORDER BY `position`");

	$posts	 = [];
	while ($row	 = mysqli_fetch_assoc($result)) {
		$posts[] = $row;
	}

	return $posts;
}


//POSTS//

function GetAllWorkPostsOrderd() {
	global $DB_CON;
	$result = mysqli_query($DB_CON, "SELECT * FROM `work_posts` ORDER BY position");

	while ($row = mysqli_fetch_assoc($result)) {
		$posts[] = $row;
	}

	return $posts;
}


function GetNextWorkPostPosition() {
	global $DB_CON;
	$result	 = mysqli_query($DB_CON, "SELECT `position` FROM `work_posts` ORDER BY `position` DESC LIMIT 1");
	$row	 = mysqli_fetch_assoc($result);
	$count	 = $row['position'] + 1;
	return $count;
}


function GetNextWorkPostHomePosition() {
	global $DB_CON;
	$result	 = mysqli_query($DB_CON, "SELECT `home_position` FROM `work_posts` ORDER BY `home_position` DESC LIMIT 1");
	$row	 = mysqli_fetch_assoc($result);
	$count	 = $row['home_position'] + 1;
	return $count;
}


function GetNextAboutExhibitionPosition($year) {
	global $DB_CON;

	$result = mysqli_query($DB_CON, "SELECT `position` FROM `about_exhibitions` WHERE `year`='$year'
                ORDER BY `position` DESC LIMIT 1");

	$row	 = mysqli_fetch_assoc($result);
	$count	 = $row['position'] + 1;

	return $count;
}


function GetNextAboutAwardPosition() {
	global $DB_CON;

	$result = mysqli_query($DB_CON, "SELECT `position` FROM `about_awards` ORDER BY `position` DESC LIMIT 1");

	$row	 = mysqli_fetch_assoc($result);
	$count	 = $row['position'] + 1;

	return $count;
}


function GetNextPublicationPosition() {
	global $DB_CON;

	$result = mysqli_query($DB_CON, "SELECT `position` FROM `publications` ORDER BY `position` DESC LIMIT 1");

	$row	 = mysqli_fetch_assoc($result);
	$count	 = $row['position'] + 1;

	return $count;
}


function PrepareTableForNewEntryOnTop($tableName, $posField) {
	global $DB_CON;
	
	$_table = mysqli_real_escape_string($DB_CON, $tableName);
	$_posFld = mysqli_real_escape_string($DB_CON, $posField);
	$entries = [];
	
	$result = mysqli_query($DB_CON, "SELECT id,$_posFld FROM $_table");
	
	while ($row = mysqli_fetch_assoc($result)) {
		$entries[] = $row;
	}
	
	foreach ($entries as $entry) {
		$id = $entry['id'];
		$newPos = $entry[$_posFld] + 1;
		mysqli_query($DB_CON, "UPDATE $_table SET $_posFld='$newPos' WHERE `id`='$id' LIMIT 1");
	}
}