<?php
/**
 * Sports Broadcasting Page
 * col-lg mb-2 mt-5 my-lg-5 ms-lg-5 rainbox my-5 ms-1 me-3 w-100
 */


get_header();
?>
<style>
    @media (max-width: 320px){
        .container{
            max-width: 320px;
        }
    }
</style>


<div class="container-flex overflow-x-hidden">
    <div class="row mx-auto w-100 text-center px-2">
        <div class="col-md mt-1 me-lg-5 mx-md-3 mt-sm-3 my-md-5 rainbox w-100" style= "background: var(--transblack2);">
            <h1>Sports Broadcasting</h1>
            <div class="row overflow-scroll flex-nowrap text-center gy-5">
                <div class="col-3 col-sm-2 col-md"> 
                    <p class="fs-6 lh-1 "> Men's<br>Baseball</p>
                </div>
                <div class="col-3 col-sm-2 col-md"> 
                    <p class="fs-6 lh-1 ">Men's<br>Basketball</p>
                </div>
                <div class="col-3 col-sm-2 col-md">  
                    <p class="fs-6 lh-1 ">Women's<br>Basketball</p>
                </div>
                <div class="col-3 col-sm-2 col-md"> 
                    <p class="fs-6 lh-1 ">Men's<br>Volleyball</p>
                </div>
                <div class="col-3 col-sm-2 col-md"> 
                    <p class="fs-6 lh-1 ">Women's<br>Volleyball</p>
                </div>
                <div class="col-3 col-sm-2 col-md"> 
                    <p class="fs-6 lh-1 ">Men's<br>Soccer</p>
                </div>
                <div class="col-3 col-sm-2 col-md"> 
                    <p class="fs-6 lh-1 ">Women's<br>Soccer</p>
                </div>
            </div>
            <div class="row text-center">
                <div class="col"><p>Here is where we will input text for the sports broadcasting page.</div>
            </div> 
        </div>
        <div class="col-md rainbox mx-auto me-md-3 ms-lg-5 my-2 my-sm-3 my-md-5 w-100" style= "background: var(--transblack2); max-width:600px;"><h1>Video</h1></div>
    </div>
</div>
<?php get_footer(); ?>