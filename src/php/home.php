<?
$table              = (isset($_GET['table'])) ? $_GET['table'] : 'work_posts';
$homePageWorkPosts = GetHomePageWorkPosts();

foreach ($homePageWorkPosts as $key => $val) {
    ?>
    <div class="cs-image-container">
        <a class="cs-overlay" href="index.php?type=post&table=work_posts&id=<? echo $val['id']; ?>">
            <span><? echo $val['title_en']; ?></span>
        </a>
        <img alt="" src="<? echo $val['thumbnail']; ?>" />
    </div>
    <?
}
?>