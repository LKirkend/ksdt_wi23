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
<div class="container-fluid px-sm-5" id="main-header">
    <div class="row gx-sm-5 pt-sm-5">
        <div class="col-sm py-2">
            <img id="home-logo">
        </div>
        <div class="col-sm card mx-auto ms-lg-5 ms-sm-auto p-0" id="tune-in-box">
            <div class="row">
                <div class="col">
                    <h1 class="card-title d-none d-lg-block mx-auto text-center" id="tune-in">tune in now:</h5>
                    <h1 class="card-title fs-1 d-none d-sm-block d-lg-none mx-auto text-center" id="tune-in">tune in now:</h5>  
                    
                </div>
            </div>
            <div class="row h-100 mx-0">
                <div class="play-btn col-5 h-100 py-sm-4">
                    <img class="play-button h-100 pb-sm-5">
                </div>
                <div class="col py-3" id="show-current">
                    <!-- <?php include(__DIR__ . '/spinitron/widgets/current-show.php') ?> -->
                    <span id="show">show name<br></span>
                    <span id="time">12:00pm-1:30pm<br></span>
                    <span id="song">song name + artist name</span>
                </div>
            </div> 
        </div>
    </div>
</div>

<?php get_footer(); ?>