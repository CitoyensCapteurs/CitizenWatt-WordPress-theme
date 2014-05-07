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
	if( is_active_sidebar( 'citizenwatt_parallax_slide_' . $lower ) ) {
?>
	<!-- Parallax slider <?=$lower?>-->
	<div class="parallax">
		<div class="parallax-content">
			<?php
			//if ( !empty( $title ) ) { echo $before_title . esc_html( $title ) . $after_title; }
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
