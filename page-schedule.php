<?php
/**
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ksdt_wi23
 */

get_header();
?>
	<section class="about_descr mt-50">
		<div style="height: 650px;padding-bottom: 25px;" class="container">
			<div class="row center">
                <div id="spin-recent"><?php include(__DIR__ . '/recent.php') ?></div>
				<div id="spin-upcoming"><?php include(__DIR__ . '/upcoming-shows.php') ?></div>
			</div>
		</div>
	</section>
<?php get_footer(); ?>