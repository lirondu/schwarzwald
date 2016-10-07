<?
$aboutExhibitionsYears	 = GetAboutExhibitionsYears();
$aboutExhibitions		 = [];

foreach ($aboutExhibitionsYears as $key => $value) {
	$aboutExhibitions[$value] = GetAboutExhibitions($value);
}

$aboutAwards = GetAboutAwardsPublished();
?>


<p style="margin: 3em 0 1em 0;">EXHIBITIONS <span style="margin-left: 10em;">(S) = Solo</span></p>

<?
foreach ($aboutExhibitions as $year => $exhibitions) {
	?>
	<div class="year_box">
		<p class="exhib_year"><? echo $year; ?></p>
		<?
		foreach ($exhibitions as $key => $val) {
			?>
			<p class="about_exhib">
				<?
				echo $val['content'];
				echo ($val['solo'] == '1') ? '<span class="solo_tag">(S)</span>' : '';
				?>
			</p>
			<?
		}
		?>
	</div>
	<?
}
?>


<p style="margin: 3em 0 1em 0;">AWARDS / GRANTS</p>

<?
foreach ($aboutAwards as $key => $val) {
	?>
	<div class="award-box">
		<p class="about-award">
			<?
			echo $val['year'].' ';
			echo $val['content'];
			?>
		</p>
	</div>
	<?
}
?>

<style>
    div.year_box {
        margin-bottom: 1.2em;
    }

    span.solo_tag {
        margin-left: 0.5em;
    }
</style>