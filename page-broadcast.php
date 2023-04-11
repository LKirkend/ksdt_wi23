<?php
/**
 * The broadcast page
 *
 * Designers: 
 * Authors: Zach Lawrence, Logan Kirkendall
 * 
 * @package ksdt_wi23
 */

get_header();
?>

<div class="container-flex">
	<div class="row w-100 mx-5 w-auto my-7">
		<div class="col-lg p-0 me-5 mb-5 rainbox" id="played-recent">
			<div class="container-flex m-5 my-5">
				<div class="row text-center">
					<h1 style="text-shadow: 0px 4px 4px var(--shadow);">Played Last</h1>
				</div>
				<div class="row">
					<div id="spin-recent">
						<?php include(__DIR__ . '/spinitron/widgets/recent-spins.php') ?>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg p-0 ms-lg-5 mb-5 rainbox" id="playing-next-cont">
			<div class="row my-5 text-center">
				<h1 style="text-shadow: 0px 4px 4px var(--shadow);">Playing Next</h1>
			</div>
			<div class="container-flex mx-auto mx-sm-5 mb-5" id="playing-next">
				<div class="row">
					<div id="spin-upcoming">
						<?php include(__DIR__ . '/spinitron/widgets/upcoming-shows.php') ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>