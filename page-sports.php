<?php
/**
 * Sports broadcasting page
 * 
 * Proxy server required to work. Code for it is located in /js/proxydist/, README shows how to use. 
 * 
 * Authors: Logan Kirkendall, Zach Lawrence, Catherine Zhang, Christine Nguyen, Chloe Keggen
 * 
 * TODO:  
 *  Style 
 *  Refactor 
 * 
 * @author Logan Kirkendall
 */

get_header();
?>

<div class="container-flex overflow-x-hidden">
    <div class="row mx-auto w-100 text-center px-2">
        <div class="col-md-8 order-md-1 order-5 mt-1 px-0 e-lg-5 my-2 mx-md-3 mt-sm-3 my-md-5 rainbox" style= "background: var(--transblack2);">
            <div class="row mt-3 mb-2"><h1>Sports Schedule</h1></div>
            <div class="row">
                <div class="col mx-3 overflow-x-hidden"><?php echo do_shortcode('[table id=1 /]') ?></div>
            </div> 
        </div>
        <div class="col-md-3 order-md-5 order-1 rainbox px-0 mx-auto me-md-3 my-2 my-sm-3 my-md-5" style= "background: var(--transblack2); max-width:600px; max-height:285px;">
            <div class="row mt-3 mb-2">
                <div class="col">
                    <a href="https://s4.radio.co/sdb5184873/listen" style="text-decoration: none">
                        <h1 class="card-title mx-auto d-block d-md-none d-xxl-block" id="tune-in" style="width: 100%; font-size: 318%">tune in now:</h1>
                        <h1 class="card-title mx-auto fs-2 d-none d-md-block d-xxl-none" id="tune-in" style="width: 100%">tune in now:</h1>
                    </a>
                </div>                      
                <div class="play-btn col-5 m-auto w-100">
                    <img id="radio-toggle" src='<?php echo get_stylesheet_directory_uri() . "/img/logos/playbutton.svg"?>' onclick="togglePlay()" class="play-button mb-3 my-auto mx-auto w-100" onerror="this.classList.add('play-button2');">
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>