<?php
/**
 * Template Name: Parallax Template
 *
 * Displays a page based on parallax effect
 *
 * @package CitizenWatt
 */
?>

<?php get_header(); ?>

</div> <?php // closes div.inner-wrap ?>

<div id="content" class="clearfix">
<?php
$nums = array('One', 'Two', 'Three', 'Four', 'Five', 'Six', 'Seven', 'Eight', 'Nine', 'Ten', 'Eleven', 'Twelve', 'Thirteen', 'Fourteen', 'Fifteen', 'Sixteen', 'Seventeen', 'Eighteen', 'Nineteen', 'Twenty', 'Twenty-one', 'Twenty-two', 'Twenty-tree');
for ($i = 0 ; $i < count($nums) ; ++$i) {
	$num = $nums[$i];
	$lower = strtolower($num);
	if( is_active_sidebar( 'citizenwatt_parallax_slide_' . $lower ) ) {
		for (
			$j = $i + 1;
			!is_active_sidebar( 'citizenwatt_parallax_slide_' . ($next = strtolower($nums[$j % count($nums)])) );
			++$j
		) {}
		$background_image = of_get_option( 'citizenwatt_parallax_image_'.$lower , '' );
		$title = of_get_option( 'citizenwatt_parallax_title_'.$lower , '' );
		$theme = of_get_option( 'citizenwatt_parallax_theme_'.$lower , '' );
		$theme = $theme == 'default' ? '' : ' parallax-theme-' . $theme;
		$color = of_get_option( 'citizenwatt_parallax_color_'.$lower , '' );
		$r = hexdec(substr($color, 1, 2));
		$g = hexdec(substr($color, 3, 2));
		$b = hexdec(substr($color, 5, 2));
		$a = min(1, max(0 , (float) of_get_option( 'citizenwatt_parallax_color_opacity_'.$lower , '' )));
?>
	<!-- Parallax slider <?=$lower?>-->
	<div
		class="parallax<?=$theme?>"
		style="background-image: url('<?= esc_url( $background_image ) ?>')">
		<div class="pageid" id="<?=$lower?>"></div>
		<div style="background-color: <?= "rgba($r,$g,$b,$a)" ?>">

			<div class="parallax-content">
				<?php
				if ( !empty( $title ) ) { echo '<h1 class="widget-title"><span>' . $title . '</span></h1>'; }
				// Calling the slide one of the parallax page if it exists.
				if ( !dynamic_sidebar( 'citizenwatt_parallax_slide_' . $lower ) ):
				endif;
				?>
				<p class="scroll_link">
					<a href="#<?= $next ?>">
						<span></span>
						<?= $num == 'One' ? 'Suivez le guide !' : '' ?>
					</a>
				</p>
			</div>

		</div>
	</div>
<?php
	}
}
?>

</div>

<div class="inner-wrap">
<?php get_footer(); ?>
