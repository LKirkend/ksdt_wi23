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
<div class="container-fluid" id="main-header">
    <div class="row">
        <div class="col">
            <img id="home-logo">
        </div>
        <div class="col card ms-auto me-5" id="tune-in-box">
            <div class="row">
                <div class="col"><h5 class="card-title mx-auto" id="tune-in">tune in now:</h5> 
                </div>
            </div>
            <div class="row">
                <div class="play-btn col-6 pt-4">
                    <img class="play-button">
                </div>
                <div class="col pt-5" id="show-current">
                    <?php include(__DIR__ . '/spinitron/widgets/current-show.php') ?>
                </div>
            </div> 
        </div>
    </div>
</div>

<?php

?>

<?php get_footer(); ?>