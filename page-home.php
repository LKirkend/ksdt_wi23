<?php
/**
 * Home page
 * 
 * Designers: Neda Emdad 
 * Authors: Logan Kirkendall, Zach Lawrence, Cody Rupp, Steven Schaeffer 
 *
 * @package KSDT_WI23
 */

get_header();
?>
<div class="container-fluid px-sm-5" id="main-header">
    <!-- logo and play button -->
    <div class="row gx-md-5 pt-sm-5">
        <div class="col-md py-2">
            <img id="home-logo">
        </div>
        <div class="col-md card mx-auto ms-lg-5 ms-sm-auto p-0 rainbox" id="tune-in-box">
            <div class="row">
                <div class="col">
                    <h1 class="card-title my-0 d-none d-lg-block mx-auto text-center mt-3" id="tune-in">tune in now:</h1>
                    <h1 class="card-title my-0 fs-1 d-none d-md-block d-lg-none mx-auto text-center" id="tune-in">tune in now:</h1>  
                </div>
            </div>
            <div class="row h-100 mx-0 overflow-y-scroll overflow-x-hidden" id="current-bottom">
                <div class="play-btn col-5 px-0 px-lg-3 h-lg-100 my-auto mh-100 py-sm-4">
                    <img id="radio-toggle" src='<?php echo get_stylesheet_directory_uri() . "/img/logos/playbutton.svg"?>' onclick="togglePlay()" class="play-button mx-0 h-100 pe-lg-0 h-lg-100 mh-100 pb-sm-5 my-5 my-md-0 pb-lg-0" onerror="this.classList.add('play-button2');">
                </div>
                <div class="col py-0 py-sm-3 px-0 h-auto my-auto mt-lg-3 mb-lg-0" id="show-current">
                    <?php include(__DIR__ . '/spinitron/widgets/current-show.php') ?>
                </div>
            </div> 
        </div>
    </div>
    <!-- scroll to learn more -->
    <div class="row mx-auto" id="scroll-sec">
        <div class="col w-100 mx-auto text-center">
            <span id="scroll-text">scoll to learn more</span>
        </div>
    </div>
    <div class="row mx-auto pb-5">
        <div class="col">
            <img id="scroll">
        </div>
    </div>
    <!-- instagram imbed -->
    <div class="row mx-auto rainbox" id="insta-box">
        <div class="row p-0 pt-3 mx-auto">
            <div class="col mb-5">
                <img id="welcome">
            </div>
        </div>
        
        <!-- the imbed, using https://wordpress.org/plugins/wp-instagram-feed-awplife/ -->
        <div class="row h-100 p-0 px-md-2 px-lg-4 mx-auto" id="insta-container"> 
            <?php $insta = file_get_contents(get_stylesheet_directory_uri()."/insta-key.txt");
                echo do_shortcode("[IFG instagram_acces_token='$insta' insta_layout='insta_layout_grid' insta_grid_columns_l='4' insta_image_limit='9' insta_image_spacing='3' insta_icon_image='yes' insta_link_redirection='_new' insta_lightbox_color='#ffffff' ]");     
            ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>