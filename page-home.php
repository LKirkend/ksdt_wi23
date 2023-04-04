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
                    <input id="radio-toggle" type="image" class="play-button" onclick="togglePlay()">
                </div>
                <div class="col pt-5" id="show-current">
                    <?php include(__DIR__ . '/spinitron/widgets/current-show.php') ?>
                </div>
            </div> 
        </div>
    </div>
</div>

<div class="radioplayer" data-src="https://s4.radio.co/s2c33c7adb/listen" data-autoplay="false" data-playbutton="false" data-volumeslider="false" data-elapsedtime="false" data-nowplaying="false" data-showplayer="false" data-volume="50" data-showartwork="false"></div>

<?php get_footer(); ?>