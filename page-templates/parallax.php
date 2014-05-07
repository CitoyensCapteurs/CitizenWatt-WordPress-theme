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
foreach (array('One', 'Two', 'Three', 'Four', 'Five', 'Six', 'Seven') as $num) {
	$lower = strtolower($num);
	$background_image = of_get_option( 'citizenwatt_parallax_image_'.$lower , '' );
	$title = of_get_option( 'citizenwatt_parallax_title_'.$lower , '' );
	$theme = of_get_option( 'citizenwatt_parallax_theme_'.$lower , '' );
	$theme = $theme == 'default' ? '' : ' parallax-theme-' . $theme;
	$color = of_get_option( 'citizenwatt_parallax_color_'.$lower , '' );
	$r = hexdec(substr($color, 1, 2));
	$g = hexdec(substr($color, 3, 2));
	$b = hexdec(substr($color, 5, 2));
	$a = min(1, max(0 , (float) of_get_option( 'citizenwatt_parallax_color_opacity_'.$lower , '' )));
	if( is_active_sidebar( 'citizenwatt_parallax_slide_' . $lower ) ) {
?>
	<!-- Parallax slider <?=$lower?>-->
	<div class="parallax" style="background-image: url(<?= esc_url( $background_image ); ?>)">
		<div class="parallax-content<?=$theme?>" style="background-color: <?php echo "rgba($r,$g,$b,$a)" ?>">
			<?php
			if ( !empty( $title ) ) { echo '<h2 class="parallax-title">' . esc_html( $title ) . '</h2>'; }
			// Calling the slide one of the parallax page if it exists.
			if ( !dynamic_sidebar( 'citizenwatt_parallax_slide_' . $lower ) ):
			endif;
			?>
		</div>
	</div>
<?php
	}
}
?>

</div>

<div class="inner-wrap">
<?php get_footer(); ?>
