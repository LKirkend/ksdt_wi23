<?php get_header();?>

<div class="container-flex" id="contact-page">
    <!-- Header -->
    <div class="row" id="contact-header">
        <!-- Text section -->
        <div class="col" id="contact-info">
            <div class="row" id="contact-location">
                <h1>Location<br></h1>
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
        <div class="col" id="contact-pics">
            <img src="<?php echo the_field('pic1')?>">
            <img src="<?php echo the_field('pic2')?>">
        </div>
    </div>
    <!-- Staff info blurb -->
    <div class="row">
        <h1>staff info</h1>
        <p>send us an email or come by our office hours!<br>internships available for all staff positions (excluding general manager)</p>
    </div>
    <!-- Staff pics -->
    <div class="row rainbox mx-5 my-5 text-center" id="staff-box">
        <!-- Row 1 -->
        <div class="row m-5 staff-row">
            <div class="col-md staff-box">
                <div class="row staff-name">
                    <h2>General Manager</h2>
                </div>
                <div class="row staff-email">
                    <h3><?php echo the_field('gm1-email');?></h3>
                </div>
                <div class="row staff-thumb">
                </div>
                <img src="<?php echo the_field('gm1_pic');?>" alt="Manager - <?php echo the_field('gm1');?>" class="staff-img">
                <div class="overlay">
                    <h2><?php echo the_field('gm1');?></h6>
                    <h3><?php echo the_field('gm1-email');?></h3>
                    <span><?php echo the_field('gm1-oh');?></span>
                </div>
                
            </div>
            <div class="col-md staff-box">
                <div class="row staff-name">
                    <h2>General Manager</h2>
                </div>
                <div class="row staff-email">
                    <h3><?php echo the_field('gm1-email');?></h3>
                </div>
                <div class="row staff-thumb">
                    <img src="<?php echo the_field('gm1_pic');?>" alt="Manager - <?php echo the_field('gm1');?>" class="staff-img">
                    <div class="overlay">
                        <h2><?php echo the_field('gm1');?></h6>
                        <h3><?php echo the_field('gm1-email');?></h3>
                        <span><?php echo the_field('gm1-oh');?></span>
                    </div>
                </div>
            </div>
            <div class="col-md staff-box">
                <div class="row staff-name">
                    <h2>General Manager</h2>
                </div>
                <div class="row staff-email">
                    <h3><?php echo the_field('gm1-email');?></h3>
                </div>
                <div class="row staff-thumb">
                    <img src="<?php echo the_field('gm1_pic');?>" alt="Manager - <?php echo the_field('gm1');?>" class="staff-img">
                    <div class="overlay">
                        <h2><?php echo the_field('gm1');?></h6>
                        <h3><?php echo the_field('gm1-email');?></h3>
                        <span><?php echo the_field('gm1-oh');?></span>
                    </div>
                </div>
            </div>
        </div>
        
</div>

<?php get_footer();?>