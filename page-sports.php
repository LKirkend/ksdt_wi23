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
    <div class="row mx-3 w-100 text-center overflow-auto">
        <div class="col-sm mt-5 my-sm-5 ms-sm-1 rainbox my-5 ms-1 me-5 w-100" style= "background: var(--transblack2);">
            <h1>Sports Broadcasting</h1>
            <div class="row overflow-scroll flex-nowrap text-center gy-5 w-100">
                <div class="col"> 
                    <p class="fs-6 lh-1 "> Men's<br>Baseball</p>
                </div>
                <div class="col"> 
                    <p class="fs-6 lh-1 ">Men's<br>Basketball</p>
                </div>
                <div class="col">  
                    <p class="fs-6 lh-1 ">Women's<br>Basketball</p>
                </div>
                <div class="col"> 
                    <p class="fs-6 lh-1 ">Men's<br>Volleyball</p>
                </div>
                <div class="col"> 
                    <p class="fs-6 lh-1 ">Women's<br>Volleyball</p>
                </div>
                <div class="col"> 
                    <p class="fs-6 lh-1 ">Men's<br>Soccer</p>
                </div>
                <div class="col"> 
                    <p class="fs-6 lh-1 ">Women's<br>Soccer</p>
                </div>
            </div>
            <div class="row text-center w-100">
                <div class="col"><p>Here is where we will input text for the sports broadcasting page.</div>
            </div> 
        </div>
        <div class="col-sm rainbox my-5 ms-1 me-5 w-100" style= "background: var(--transblack2);"><h1>Video</h1></div>
    </div>
</div>
<?php get_footer(); ?>