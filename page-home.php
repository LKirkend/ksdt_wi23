<?php
/**
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ksdt_wi23
 */

get_header();
?>
    <h1>ksdt</h1>
    <h3>ucsd's firecely independent radio station</h3>

    <!-- Spinitrion-Integrated Current Show Widget
    (Zach: don't worry about formatting this, that is my problem!)-->
    <p>tune in now:</p>
    <div id="show-current"><?php include(__DIR__ . '/spinitron/widgets/current-show.php') ?></div>
<?php get_footer(); ?>