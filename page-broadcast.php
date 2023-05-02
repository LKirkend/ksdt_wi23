<?php
/**
 * The broadcast page
 *
 * Designers: 
 * Authors: Zach Lawrence, Logan Kirkendall
 * 
 * @package KSDT_WI23
 */

get_header();
?>

<div class="container-flex overflow-x-hidden">
	<div class="row w-100 mx-3 mx-md-2 mx-xxl-5 w-auto my-7">
		<!-- Radio History -->
		<div class="col-xl p-0 me-xl-2 me-xxl-5 mb-5 rainbox" id="played-recent">
			<div class="container-flex mx-3 mx-sm-1 mx-md-5 mx-xl-1 mx-xxl-5 my-5">
				<div class="row text-center pb-5">
					<div class="col">
						<h1 style="text-shadow: 0px 4px 4px var(--shadow);">Played Last</h1>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<div id="spin-recent">
							<?php include(__DIR__ . '/spinitron/widgets/recent-spins.php') ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Upcoming Songs -->
		<div class="col-xl p-0 ms-xl-2 ms-xxl-2 mx-auto mb-5 rainbox" id="playing-next-cont">
			<div class="row my-5 mx-auto text-center">
				<div class="col"><h1 style="text-shadow: 0px 4px 4px var(--shadow);">Playing Next</h1></div>
			</div>
			<div class="container-flex mx-3 mx-sm-1 mb-5 mx-md-5 mx-xl-1 mx-xxl-5 p-0" id="playing-next">
				<div class="row">
					<div class="col">
						<div id="spin-upcoming">
							<?php include(__DIR__ . '/spinitron/widgets/upcoming-shows.php') ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>