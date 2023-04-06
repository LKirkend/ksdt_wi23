<?php
/**
 * Blog page
 * 
 * Designers: Cindy Nguyen
 * Authors: Catherine Zhang, Logan Kirkendall
 * 
 * @package KSDT_WI23
 */

get_header();
?>

<div class="container-flex">
    <div class="row pb-5 w-100">
        <div class="col text-center" id="spotlight">
            <span>spotlight</span>
        </div>
    </div>
    <!-- articles -->
    <div class="row p-lg-5 mx-auto px-3 pb-5 w-100">
        <div class="col px-0 rainbox" id="article-box">
            <div class="row w-100 pt-5 mx-auto pb-3">
                <?php echo do_shortcode('[bdp_post grid="3" design="design1" limit="10" show_tags="false" pagination=”true” show_read_more="false" show_date="false" show_content="false"]');?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>