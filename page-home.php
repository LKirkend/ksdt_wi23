<?php
/**

 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *

 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ksdt_wi23
 */

get_header();
?>

<div class="radioplayer" data-src="https://s4.radio.co/s2c33c7adb/listen" data-autoplay="false" data-playbutton="true" data-volumeslider="true" data-elapsedtime="true" data-nowplaying="true" data-showplayer="true" data-volume="50" data-showartwork="false"></div>

<?php get_footer(); ?>