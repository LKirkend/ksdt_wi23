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
	<div class="row mx-5 my-7 p-5">
		<div class="col me-5 p-0 rainbox" id="playing-now">
			<div class="container-flex mx-5 my-4">
				<div class="row text-center">
					<h1>Played Last</h1>
				</div>	
				<div class="row">
					<div id="spin-recent"><?php include(__DIR__ . '/spinitron/widgets/recent-spins.php') ?></div>
				</div>
			</div>
		</div>
		<div class="col ms-5 p-0 rainbox" id="playing-next">
			<div class="container-flex mx-5 my-4">
				<div class="row text-center">
					<h1>Playing Next</h1>
				</div>
				<div class="row">
					<div id="spin-upcoming"><?php include(__DIR__ . '/spinitron/widgets/upcoming-shows.php') ?></div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>