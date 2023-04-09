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
<div class="container-fluid">
	<div class="row w-100 mx-auto my-5 position-relative z-1 rainbox" id="scheduler-box">
		<div class="row mx-auto py-5" >
			<?php echo do_shortcode('[CP_APP_HOUR_BOOKING id="1"]')?>
		</div>

		<div class="row py-5 mx-auto text-center" id="appts">
			<?php echo do_shortcode('[CP_APP_HOUR_BOOKING_LIST calendar="1" from="today" to="today +7 days" fields="weekday, DATE, TIME, fieldname2, EDITLINK" onlycurrentuser="yes"]')?>
		</div>
	</div>
</div>
<?php get_footer(); ?>