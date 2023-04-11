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
                    <?php the_title(); ?>
                </div>
                <!-- author -->
                <div class="row d-block" id="blog-author">
                    <?php the_author(); ?>
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
            <div class="mx-md-5 my-4 mw-fit" id="blog-txt-container">
                <div class="row mw-fit" id="blog-content">
                    <?php the_content(); ?>
                </div>
                <!-- share this -->
                
                <div class="row" id="share-this">
                    <p class="row mb-1 me-auto">
                        -<br>share this 
                    </p>                
                    <div class="my-1 d-flex" id="copiedPlaceholder"></div>
                        
                    <!-- share links -->
                    <div class="row me-auto" id="share-links">
                        
                        <a id="copiedBtn" onClick="navigator.clipboard.writeText('<?php the_permalink() ?>');"><img id="share-logo" class="mt-2"></a> 
                        <a href="https://twitter.com/intent/tweet?text=Check out <?php  the_title();?>, by <?php the_author();?>, at <?= the_permalink() ?>"><img id="twitter-logo" class="ms-2 ms-sm-3 mt-2"></a> 
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink()  ?>"><img id="fb-logo" class="ms-2 ms-sm-3 mt-2"></a> 
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <!-- Read more -->
    <div class="row rainbox pt-3 pb-5 px-5" id="read-more-section">
        <div class="row pb-5 pt-4 mx-auto mx-md-none d-inline text-lg-start text-center" id="read-more-title">
            read more
        </div>
        <div class="row read-more-container">           
            <?php echo do_shortcode('[bdp_masonry effect=”effect-2″ grid="3" design="design1" limit="3" show_tags="false" pagination=”false” show_read_more="false" show_date="false" show_content="false"]');?>
        </div>
    </div>
</div>

<!-- Scripts -->
<script>
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
                </script>
<script> 
    // Force share-this before the jetpack photo gallery, implemented in wp-admin/posts.
    const share = document.getElementById('share-this');
    const gallery = document.getElementsByClassName('wp-block-jetpack-tiled-gallery')[0];
    const parent = gallery.parentNode;
    
    parent.insertBefore(share, gallery);

    // Force gallery after blog box.
    const readMore = document.getElementById('read-more-section');
    const readParent = readMore.parentNode;

    readParent.insertBefore(gallery, readMore);
</script>

<?php get_footer(); ?>