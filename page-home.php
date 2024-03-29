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
<div class="container-fluid px-lg-5 p-2" id="main-header">
    <!-- logo and play button -->
    <div class="row gx-md-5 mx-auto mw-100 pt-sm-5 px-xxl-5 mx-xxl-5" style="height: 480px">
        <div class="col-md py-2">
            <img class="d-flex mx-auto mx-lg-0" id="home-logo">
        </div>
        <div class="col-md card mx-auto ms-lg-5 ms-sm-auto p-0 rainbox h-100" id="tune-in-box">
            <div class="row">
                <div class="col">
                    <a href="https://s4.radio.co/s2c33c7adb/listen">
                        <h1 class="card-title my-0 d-none d-lg-block mx-auto text-center mt-3" id="tune-in">tune in now:</h1></a>
                        <h1 class="card-title my-0 fs-1 d-lg-none mx-auto text-center" id="tune-in">tune in now:</h1>  
                    </a>
                </div>
            </div>
            <div class="row h-100 mx-0 overflow-y-scroll overflow-x-hidden" id="current-bottom">
                <div class="play-btn col-5 px-0 px-lg-3 h-lg-100 my-auto mh-100 py-sm-4">
                    <img id="radio-toggle" src='<?php echo get_stylesheet_directory_uri() . "/img/logos/playbutton.svg"?>' onclick="togglePlay()" class="play-button pt-0 mx-0 h-100 pe-lg-0 h-lg-100 mh-100 mt-0 pb-sm-5 my-lg-auto my-md-0 pb-lg-0" onerror="this.classList.add('play-button2');">
                </div>
                <div class="col py-0 px-0 h-auto mb-auto my-auto mt-sm-0 mt-md-4 mb-lg-auto mt-lg-4" id="show-current">
                    <?php include(__DIR__ . '/spinitron/widgets/current-show.php') ?>
                </div>
            </div> 
            <div class="row">
                <div class="col">
                    <a class="row" href="<?php  global $wp;
$current_url = home_url( add_query_arg( array(), $wp->request ) ); echo($current_url . "/sports");?>">
                        <div class="col pe-0 text-end" style="text-shadow: 5px 5px 4px var(--shadow)">
                            <p class="mt-5">Sports Broadcast</p>
                        </div>
                        <div class="col-2 ps-0">
                            <img class="right-arrow mt-4">
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- scroll to learn more -->
    <div class="row mx-auto" id="scroll-sec">
        <div class="col w-100 mx-auto text-center">
            <span id="scroll-text">scroll to learn more</span>
        </div>
    </div>
    <div class="row mx-auto pb-5">
        <div class="col">
            <img id="scroll">
        </div>
    </div>
    <!-- instagram imbed -->
    <div class="row mx-auto rainbox mb-5" id="insta-box">
        <div class="row p-0 pt-3 mx-auto">
            <div class="col mb-lg-3">
                <img id="welcome">
            </div>
        </div>
        
        <!-- the imbed, using https://wordpress.org/plugins/wp-instagram-feed-awplife/ -->
        <div class="row h-100 p-0 px-md-2 px-lg-4 mx-auto" id="insta-container"> 
            <?php $insta = INSTA_KEY;
                echo do_shortcode("[IFG instagram_acces_token='$insta' insta_layout='insta_layout_grid' insta_grid_columns_l='4' insta_image_limit='9' insta_image_spacing='3' insta_icon_image='yes' insta_link_redirection='_new' insta_lightbox_color='#ffffff' ]");     
            ?>
        </div>
    </div>

    <!-- youtube embed -->
    <div class="row mx-auto rainbox mt-5" id="yt-box">
        <div class="row">
            <div class="col mx-auto mt-4 mb-2 text-center"><h1>YouTube</h1></div>
        </div>
        <div class="row mx-auto mb-4">
            <div class="col">
                <?php echo do_shortcode('[youtube-feed feed=1]') ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>