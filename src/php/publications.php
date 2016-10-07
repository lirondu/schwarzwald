<?
$pubs = GetPublicationsPublished();

foreach ($pubs as $key => $val) {
	?>
	<div class="pub-box">
		<p class="pub">
			<? echo $val['title']; ?>
			<br>
			<? echo $val['content']; ?>
		</p>
	</div>
	<?
}
