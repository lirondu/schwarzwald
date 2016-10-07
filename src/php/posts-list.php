<?
$table              = (isset($_GET['table'])) ? $_GET['table'] : 'work_posts';
$publishedWorkPosts = GetPublishedWorkPosts($table);
?>

    <ul id="posts-list">
        <?
    foreach ($publishedWorkPosts as $key => $val) {
        ?>
            <li>
                <a href=<? echo '"index.php?type=post&id=' . $val[ 'id'] . '"'; ?>>
					<? echo $val['title_en']; ?>,
                	<span class="year"><? echo $val['year']; ?></span>,
                	<span class="location"><? echo $val['location']; ?></span>,
                	<span class="city"><? echo $val['city']; ?></span>,
                	<span class="country"><? echo $val['country']; ?></span>
				</a>
            </li>
            <?
    }
    ?>

    </ul>