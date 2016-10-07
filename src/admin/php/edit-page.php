<?php
$pageId = (isset($_GET['id'])) ? $_GET['id'] : 0;

if ($pageId != 0) {
	$currPage = GetSinglePage($pageId);
} else {
	$currPage['type'] = -1;
}

$allPages = GetAllPages();
?>


<div id="editor-container">
    <form action="javascript:void(0);" class="page-editor">
        <div class="form-fields">
            <ul>
                <li class="clear" style="margin-bottom:15px;">
                    <label for="edit_page_select">Editing Page:</label>
                    <input type="checkbox" style="visibility: hidden;" />
                    <select name="page_id" id="edit_page_select">
                        <option value="">Choose page to edit...</option>
						<?
						foreach ($allPages as $akey => $aval) {
							if ($aval['type'] != $pageTypesMap['TextPage']) {
								continue;
							}
							?>
							<option value="<? echo $aval['id']; ?>" 
									<? echo ($pageId == $aval['id']) ? 'selected="selected"' : ''; ?>>
										<? echo $aval['title_en']; ?>
							</option>
							<?
						}
						?>
                    </select>
                </li>

				<?
				if ($currPage['type'] == $pageTypesMap['TextPage']) {
					?>
					<li>
						<label for="title-en">English Title</label>
						<input type="checkbox" style="visibility: hidden;" />
						<input name="title-en" id="title-en" type="text" value="<? echo $currPage['title_en']; ?>" />
					</li>
					<?
				}
				?>

			</ul>
		</div>

		<?
		if ($currPage['type'] == $pageTypesMap['TextPage']) {
			?>
			<label for="content-en" style="margin-bottom: 3px; display: block;">English content:</label>
			<textarea rows="1" cols="1" id="ckeditor-en" name="content-en">
				<? echo $currPage['content_en']; ?>
			</textarea>

			<input type="hidden" name="edit-page-id" value="<? echo $currPage['id']; ?>" />
			<input type="submit" value="Submit" class="submit ui_btn" id="edit-page-submit" />
			<?
		}
		?>
	</form>
</div>

<script type = "text/javascript" src = "js/cmsSitePages.js"></script>