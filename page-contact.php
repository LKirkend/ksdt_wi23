<?php 
/**
 * This page includes KSDT's general contact info, including it's address and phone number, as well as the emails of each staff member.
 * 
 * @package KSDT_WI23
 */
get_header();
?>

<div class="container-flex" id="contact-page">
    <!-- Header -->
    <div class="row mx-0" id="contact-header">
        <!-- Text section -->
        <div class="col-xxl mw-fit" id="contact-info">
            <div class="row" id="contact-location">
                <h1>location<br></h1>
                <p>follow the good music - we're located across from the General Store in the old Student Center</p>
            </div>
            <div class="row" id="contact-location">
                <h2>KSDT Radio</h2>
                <p>University of California, San Diego</p>
                <p>9500 Gilman Dr. #0077</p>
                <p>La Jolla, CA 92093-0315</p>
            </div>
            <div class="row" id="contact-radio">
                <h2>phone</h2>
                <p>(858) 534-KSDT</p>
            </div>
            <div class="row" id="contact-phone">
                <h2>email</h2>
                <p><a href="mailto:gm@ksdt.org">gm@ksdt.org</a></p>
            </div>
        </div>
        <!-- Pics section -->
        <div class="col-xxl" id="contact-pics">
            <img class="position-absolute z-0 d-none d-xxl-block" id="cont-img1" src="<?php echo the_field('pic1')?>">
            <img class="position-absolute z-1 d-none d-xxl-block" id="cont-img2" src="<?php echo the_field('pic2')?>">
        </div>
    </div>
    <!-- Staff info blurb -->
    <div class="row text-center mx-auto d-inline mw-fit">
        <h1 class="mx-auto mb-0" id="staff-info">staff info</h1>
        <p style="margin-bottom: 8rem;">send us an email or come by our office hours!<br>internships available for all staff positions (excluding general manager)</p>
    </div>
    <!-- Staff pics -->
    <div class="row rainbox mx-3 mx-sm-5 my-5 text-center" id="staff-box">
        <div class="container">
            <!-- Row 1 -->
            <div class="row m-0 row-cols-xxl-4 row-cols-md-2 row-cols-1 staff-row">
                <div class="col my-5 staff-cont">
                    <div class="row staff-type">
                        <h2>General Manager</h2>
                    </div>
                    <div class="row staff-email">
                        <h3><?php echo the_field('gm1-email');?></h3>
                    </div>
                    <div class="row staff-thumb mx-auto">
                        <img src="<?php echo the_field('gm1_pic');?>" alt="<?php echo the_field('gm1');?>" class="staff-img mx-auto">
                        <div class="overlay mx-auto">   
                            <h2><?php echo the_field('gm1');?></h2>
                            <h3 class="mt-5 pt-3"><?php echo the_field('gm1-email');?></h3>
                            <h4 class="my-5 pb-5"><?php echo the_field('gm1-oh');?></h4>
                        </div>
                    </div>         
                </div>
                <div class="col my-5 staff-cont">
                    <div class="row staff-type">
                        <h2>Marketing</h2>
                    </div>
                    <div class="row staff-email">
                        <h3><?php echo the_field('marketing-email');?></h3>
                    </div>
                    <div class="row staff-thumb mx-auto">
                        <img src="<?php echo the_field('marketing_pic');?>" alt="<?php echo the_field('marketing');?>" class="staff-img mx-auto">
                        <div class="overlay mx-auto">   
                            <h2><?php echo the_field('marketing');?></h2>
                            <h3 class="mt-5 pt-3"><?php echo the_field('marketing-email');?></h3>
                            <h4 class="my-5 pb-5"><?php echo the_field('marketing-oh');?></h4>
                        </div>
                    </div>         
                </div>
                <div class="col my-5 staff-cont">
                    <div class="row staff-type">
                        <h2>Music Submissions</h2>
                    </div>
                    <div class="row staff-email">
                        <h3><?php echo the_field('promotions-email');?></h3>
                    </div>
                    <div class="row staff-thumb mx-auto">
                        <img src="<?php echo the_field('promotions_pic');?>" alt="<?php echo the_field('promotions');?>" class="staff-img mx-auto">
                        <div class="overlay mx-auto">   
                            <h2><?php echo the_field('promotions');?></h2>
                            <h3 class="mt-5 pt-3"><?php echo the_field('promotions-email');?></h3>
                            <h4 class="my-5 pb-5"><?php echo the_field('promotions-oh');?></h4>
                        </div>
                    </div>         
                </div>
                <div class="col my-5 staff-cont">
                    <div class="row staff-type">
                        <h2>Music Director</h2>
                    </div>
                    <div class="row staff-email">
                        <h3><?php echo the_field('music_director-email');?></h3>
                    </div>
                    <div class="row staff-thumb mx-auto">
                        <img src="<?php echo the_field('music_director_pic');?>" alt="<?php echo the_field('music_director');?>" class="staff-img mx-auto">
                        <div class="overlay mx-auto">   
                            <h2><?php echo the_field('music_director');?></h2>
                            <h3 class="mt-5 pt-3"><?php echo the_field('music_director-email');?></h3>
                            <h4 class="my-5 pb-5"><?php echo the_field('music_director-oh');?></h4>
                        </div>
                    </div>         
                </div>
            </div>
            <!-- Row 2 -->
            <div class="row m-0 row-cols-xxl-4 row-cols-md-2 row-cols-1 staff-row">
                <div class="col my-5 staff-cont">
                    <div class="row staff-type">
                        <h2>Computer Engineer</h2>
                    </div>
                    <div class="row staff-email">
                        <h3><?php echo the_field('tech-email');?></h3>
                    </div>
                    <div class="row staff-thumb mx-auto">
                        <img src="<?php echo the_field('tech_pic');?>" alt="<?php echo the_field('tech');?>" class="staff-img mx-auto">
                        <div class="overlay mx-auto">   
                            <h2><?php echo the_field('tech');?></h2>
                            <h3 class="mt-5 pt-3"><?php echo the_field('tech-email');?></h3>
                            <h4 class="my-5 pb-5"><?php echo the_field('tech-oh');?></h4>
                        </div>
                    </div>         
                </div>
                <div class="col my-5 staff-cont">
                    <div class="row staff-type">
                        <h2>Audio Engineer</h2>
                    </div>
                    <div class="row staff-email">
                        <h3><?php echo the_field('engineer1-email');?></h3>
                    </div>
                    <div class="row staff-thumb mx-auto">
                        <img src="<?php echo the_field('engineer1_pic');?>" alt="<?php echo the_field('engineer1');?>" class="staff-img mx-auto">
                        <div class="overlay mx-auto">   
                            <h2><?php echo the_field('engineer1');?></h2>
                            <h3 class="mt-5 pt-3"><?php echo the_field('engineer1-email');?></h3>
                            <h4 class="my-5 pb-5"><?php echo the_field('engineer1-oh');?></h4>
                        </div>
                    </div>         
                </div>
                <div class="col my-5 staff-cont">
                    <div class="row staff-type">
                        <h2>Audio Engineer</h2>
                    </div>
                    <div class="row staff-email">
                        <h3><?php echo the_field('engineer2-email');?></h3>
                    </div>
                    <div class="row staff-thumb mx-auto">
                        <img src="<?php echo the_field('engineer2_pic');?>" alt="<?php echo the_field('engineer2');?>" class="staff-img mx-auto">
                        <div class="overlay mx-auto">   
                            <h2><?php echo the_field('engineer2');?></h2>
                            <h3 class="mt-5 pt-3"><?php echo the_field('engineer2-email');?></h3>
                            <h4 class="my-5 pb-5"><?php echo the_field('engineer2-oh');?></h4>
                        </div>
                    </div>         
                </div>
                <div class="col my-5 staff-cont">
                    <div class="row staff-type">
                        <h2>Design</h2>
                    </div>
                    <div class="row staff-email">
                        <h3><?php echo the_field('graphics-email');?></h3>
                    </div>
                    <div class="row staff-thumb mx-auto">
                        <img src="<?php echo the_field('graphics_pic');?>" alt="<?php echo the_field('graphics');?>" class="staff-img mx-auto">
                        <div class="overlay mx-auto">   
                            <h2><?php echo the_field('graphics');?></h2>
                            <h3 class="mt-5 pt-3"><?php echo the_field('graphics-email');?></h3>
                            <h4 class="my-5 pb-5"><?php echo the_field('graphics-oh');?></h4>
                        </div>
                    </div>         
                </div>
            </div>
            <!-- Row 3 -->
            <div class="row m-0 row-cols-xxl-4 row-cols-md-2 row-cols-1 staff-row">
                <div class="col my-5 staff-cont">
                    <div class="row staff-type">
                        <h2>Office Manager</h2>
                    </div>
                    <div class="row staff-email">
                        <h3><?php echo the_field('secretary-email');?></h3>
                    </div>
                    <div class="row staff-thumb mx-auto">
                        <img src="<?php echo the_field('secretary_pic');?>" alt="<?php echo the_field('secretary');?>" class="staff-img mx-auto">
                        <div class="overlay mx-auto">   
                            <h2><?php echo the_field('secretary');?></h2>
                            <h3 class="mt-5 pt-3"><?php echo the_field('secretary-email');?></h3>
                            <h4 class="my-5 pb-5"><?php echo the_field('secretary-oh');?></h4>
                        </div>
                    </div>         
                </div>
                <div class="col my-5 staff-cont">
                    <div class="row staff-type">
                        <h2>Programming Director</h2>
                    </div>
                    <div class="row staff-email">
                        <h3><?php echo the_field('programming-email');?></h3>
                    </div>
                    <div class="row staff-thumb mx-auto">
                        <img src="<?php echo the_field('programming_pic');?>" alt="<?php echo the_field('programming');?>" class="staff-img mx-auto">
                        <div class="overlay mx-auto">   
                            <h2><?php echo the_field('programming');?></h2>
                            <h3 class="mt-5 pt-3"><?php echo the_field('programming-email');?></h3>
                            <h4 class="my-5 pb-5"><?php echo the_field('programming-oh');?></h4>
                        </div>
                    </div>         
                </div>
                <div class="col my-5 staff-cont">
                    <div class="row staff-type">
                        <h2>Media</h2>
                    </div>
                    <div class="row staff-email">
                        <h3><?php echo the_field('media-email');?></h3>
                    </div>
                    <div class="row staff-thumb mx-auto">
                        <img src="<?php echo the_field('media_pic');?>" alt="<?php echo the_field('media');?>" class="staff-img mx-auto">
                        <div class="overlay mx-auto">   
                            <h2><?php echo the_field('media');?></h2>
                            <h3 class="mt-5 pt-3"><?php echo the_field('media-email');?></h3>
                            <h4 class="my-5 pb-5"><?php echo the_field('media-oh');?></h4>
                        </div>
                    </div>         
                </div>
                <div class="col my-5 staff-cont">
                    <div class="row staff-type">
                        <h2>Event Coordinator</h2>
                    </div>
                    <div class="row staff-email">
                        <h3><?php echo the_field('events-email');?></h3>
                    </div>
                    <div class="row staff-thumb mx-auto">
                        <img src="<?php echo the_field('events_pic');?>" alt="<?php echo the_field('events');?>" class="staff-img mx-auto">
                        <div class="overlay mx-auto">   
                            <h2><?php echo the_field('events');?></h2>
                            <h3 class="mt-5 pt-3"><?php echo the_field('events-email');?></h3>
                            <h4 class="my-5 pb-5"><?php echo the_field('events-oh');?></h4>
                        </div>
                    </div>         
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer();?>