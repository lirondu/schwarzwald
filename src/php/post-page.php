<?
$table = (isset($_GET['table'])) ? $_GET['table'] : 'work_posts';
$post = GetSinglePost($table, $id);
?>

<div class="post-container">
    <h4><? echo $post['title_en']; ?></h4>
    <h4><? echo $post['year']; ?></h4>

    <div class="work-post-content">
    <? echo $post['content_en']; ?>
    <p>
    <? echo $post['location']; ?>,
    <? echo $post['city']; ?>,
    <? echo $post['country']; ?>
    </p>
    </div>

    <div id="post_gallery">
        <input type="hidden" id="post_gallery_title" value="<? echo $post['gallery_title_en']; ?>" />
        <?
        if ($post['gallery_content'] != '0') {
          echo $post['gallery_content'];
        }
        ?>
    </div>
</div>
