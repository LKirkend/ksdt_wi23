<?php
/**
 * The page containing the scheduler element.
 *
 * Authors: Logan Kirkendall
 * 
 * @package KSDT_WI23
 */

get_header();
?>
<div class="container-fluid px-0 w-100">
	<div class="row w-100 mx-auto my-5 position-relative z-1 rainbox" id="scheduler-box">
		<div class="row mx-auto py-5" >
            <?php echo do_shortcode('[CP_APP_HOUR_BOOKING_EDIT_BOOKING]')?>
		</div>
	</div>
</div>
<?php get_footer(); ?>