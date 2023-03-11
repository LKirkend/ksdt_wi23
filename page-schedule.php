<?php
/**
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ksdt_wi23
 */

get_header();
?>
    <div id="spin-recent"><?php include(__DIR__ . '/spinitron/widgets/recent-spins.php') ?></div>
	<h2>Playing Next</h2>
	<div id="spin-upcoming"><?php include(__DIR__ . '/spinitron/widgets/upcoming-shows.php') ?></div>
<?php get_footer(); ?>