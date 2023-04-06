<?php get_header(); ?>
  <style>
    iframe {
      width: 100%;
      height: 600px
    }
  </style>
<body>
  <div class="content">
    <div style="height: 2000px; padding-top: 50px" class="container">'
      <div>
        <?php echo do_shortcode('[CP_APP_HOUR_BOOKING_ADMIN]')?>
      </div>
      <div class="row center">
        <a href="https://ksdt.ucsd.edu/wp-admin/admin.php?page=cp_apphourbooking&cal=1&schedule=1&calendarview=1&r=0.3494832573835398" target="_blank" class="button-listen-live" style="font-size: 20px;">Current Schedule&nbsp;</a>
        <a href="https://ksdt.ucsd.edu/wp-admin/admin.php?page=cp_apphourbooking" target="_blank" class="button-listen-live" style="font-size: 20px;">Admin Dashboard&nbsp;</a>
      </div>
    </div>
  </div>
  <?php get_footer(); ?>
</body>
