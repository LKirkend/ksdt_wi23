<?php get_header(); ?>

<div class="container-flex" style="height:866px;">
  <div class="row center rainbox mx-auto w-25 my-5" style="background-color: var(--transblack2)">
    <div class="col mx-auto py-5">
      <?php echo do_shortcode('[ultimatemember form_id="4162"]')?>
    </div>
  </div>
</div>

<!-- For whatever reason, the plugin won't load without manually resizing the page. -->
<script type="text/javascript">
  jQuery(document).ready(function($) {
    setTimeout(function() {
      jQuery(window).trigger("resize");
    }, 10);
  });
</script>

<?php get_footer(); ?>
