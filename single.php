<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package KSDT_WI23
 */

get_header();
?>

<div class="container-fluid">
    <!-- Main post -->
    <?php while( have_posts() ) {
        the_post(); ?>
        <div class="row mw-fit">
            <!-- Header -->
            <div class="col-lg text-center mx-4 mw-fit py-5 h-auto my-auto">
                <!-- category / date -->
                <div class="row">
                    <div class="col d-block text-end" id="blog-cat">                        
                        <?php the_category(); ?>
                    </div>
                    <div class="col d-block text-start" id="blog-date">
                        <?php the_date(); ?>
                    </div>
                </div>
                <!-- title -->
                <div class="row d-block my-3" id="blog-title">
                    <div class="col">
                        <?php the_title(); ?>
                    </div>
                </div>
                <!-- author -->
                <div class="row d-block" id="blog-author">
                    <div class="col">
                        <?php the_author(); ?>
                    </div>
                </div>
            </div>
            
            <!-- Featured image -->
            <div class="col-lg px-0">
                <?php $featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' ); ?>
                <img id="featured" style="content:url(<?php echo $featured_image[0]; ?>);" onerror="this.classList.add('spinning-record')">
            </div>
        </div>
        <!-- Blog text -->
        <div class="row d-flex" id="blog-block">
            <div class="col mx-md-5 my-4 mw-fit" id="blog-txt-container">
                <div class="row mw-fit" id="blog-content">
                    <div class="col mw-fit w-100">
                        <?php the_content(); ?>
                    </div>
                </div>
                <!-- share this -->
                
                <div class="row" id="share-this">
                    <div class="col">
                        <p class="row mb-1 me-auto">
                            -<br>share this 
                        </p>             
                    </div>   
                    <div class="my-1 d-flex" id="copiedPlaceholder"></div>
                        
                    <!-- share links -->
                    <div class="row me-auto" id="share-links">
                        <div class="col">
                            <a id="copiedBtn" onClick="navigator.clipboard.writeText('<?php the_permalink() ?>');"><img id="share-logo" class="mt-2"></a> 
                            <a href="https://twitter.com/intent/tweet?text=Check out <?php  the_title();?>, by <?php the_author();?>, at <?= the_permalink() ?>"><img id="twitter-logo" class="ms-2 ms-sm-3 mt-2"></a> 
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink()  ?>"><img id="fb-logo" class="ms-2 ms-sm-3 mt-2"></a> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <!-- Read more -->
    <div class="row rainbox" id="read-more-section">
        <div class="row pb-5 pt-4 mx-auto mx-md-none d-inline text-lg-start text-center" id="read-more-title">
            <div class="col">
                read more
            </div>
        </div>
        <div class="row px-5 pb-5 read-more-container">     
            <div class="col">      
                <?php echo do_shortcode('[bdp_masonry effect=”effect-2″ grid="3" design="design1" limit="3" show_tags="false" pagination=”false” show_read_more="false" show_date="false" show_content="false"]');?>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script>
    // Share button "Copied to clipboard!" inline alert
    const alertPlaceholder = document.getElementById('copiedPlaceholder')
    const appendAlert = (message, type) => {
        const wrapper = document.createElement('div')
        wrapper.innerHTML = [
            `<div class="alert alert-${type} alert-dismissible" role="alert">`,
            `   <div>${message}</div>`,
            '   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>',
            '</div>'
        ].join('')

        alertPlaceholder.append(wrapper)
    }

    const alertTrigger = document.getElementById('copiedBtn')
    if (alertTrigger) {
        alertTrigger.addEventListener('click', () => {
            appendAlert('Copied to the clipboard!', 'success')
        })
    }
    
    // Force share-this before the jetpack photo gallery, implemented in wp-admin/posts.
    const share = document.getElementById('share-this');
    // Get the last instance of the image gallery
    const galleries = document.getElementsByClassName('wp-block-jetpack-tiled-gallery');
    const gallery=galleries[galleries.length-1]
    const parent = gallery.parentNode;
    
    parent.insertBefore(share, gallery);

    // Force gallery after blog box.
    const readMore = document.getElementById('read-more-section');
    const readParent = readMore.parentNode;

    readParent.insertBefore(gallery, readMore);
</script>

<?php get_footer(); ?>