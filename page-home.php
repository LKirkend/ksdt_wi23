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
            <div class="row h-100 mx-0">
                <div class="play-btn col-5 h-100 py-sm-4">
                    <img class="play-button h-100 pb-sm-5">
                </div>
                <div class="col py-0 py-sm-3" id="show-current">
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
        <!-- row 1 -->
        <div class="row p-0 px-md-2 px-lg-4 py-md-2 py-lg-4 mx-auto">
            <div class="col-sm px-0 py-0 pe-md-2 pe-lg-5">
                <img id="botb" class="insta-embed w-100 px-2 px-md-0 py-1 py-md-0">
            </div>
            <div class="col-sm px-0 py-0 px-md-2 px-lg-5">
                <img id="botb" class="insta-embed w-100 px-2 px-md-0 py-1 py-md-0">
            </div>
            <div class="col-sm px-0 py-0 ps-md-2 ps-lg-5">
                <img id="botb" class="insta-embed w-100 px-2 px-md-0 py-1 py-md-0">
            </div>
        </div>
        <!-- row 2 -->
        <div class="row p-0 px-md-2 px-lg-4 py-md-2 py-lg-4 mx-auto">
            <div class="col-sm px-0 py-0 pe-md-2 pe-lg-5">
                <img id="botb" class="insta-embed w-100 px-2 px-md-0 py-1 py-md-0">
            </div>
            <div class="col-sm px-0 py-0 px-md-2 px-lg-5">
                <img id="botb" class="insta-embed w-100 px-2 px-md-0 py-1 py-md-0">
            </div>
            <div class="col-sm px-0 py-0 ps-md-2 ps-lg-5">
                <img id="botb" class="insta-embed w-100 px-2 px-md-0 py-1 py-md-0">
            </div>
        </div>
        <!-- row 3 -->
        <div class="row p-0 mb-2 px-md-2 px-lg-4 pt-md-2 pt-lg-4 pb-md-2 pb-lg-3 mx-auto">
            <div class="col-sm px-0 py-0 pe-md-2 pe-lg-5">
                <img id="botb" class="insta-embed w-100 px-2 px-md-0 py-1 py-md-0">
            </div>
            <div class="col-sm px-0 py-0 px-md-2 px-lg-5">
                <img id="botb" class="insta-embed w-100 px-2 px-md-0 py-1 py-md-0">
            </div>
            <div class="col-sm px-0 py-0 ps-md-2 ps-lg-5">
                <img id="botb" class="insta-embed w-100 px-2 px-md-0 pt-1 pb-2 py-md-0">
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>