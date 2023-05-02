<?php 
/**
 * This page is for Admins to view all the current practice room bookings.
 * 
 * @package KSDT_WI23
 */
get_header(); 
?>

<div class="container-flex" style="height:1300px;">  
  <div class="row pt-5">
    <div class="col-lg display-inline ms-5 text-center">
      <a href="https://ksdt.ucsd.edu/wp-admin/admin.php?page=cp_apphourbooking&cal=1&schedule=1&calendarview=1&r=0.3494832573835398" class="admin-btn py-5">Current Schedule&nbsp;</a>
    </div>
    <div class="col-lg display-inline me-5 text-center">
      <a href="https://ksdt.ucsd.edu/wp-admin/admin.php?page=cp_apphourbooking" class="admin-btn py-5">Admin Dashboard&nbsp;</a>
    </div>
  </div>
  <div class="row rainbox my-5 mx-5" style="background-color: var(--transblack2)">
    <?php echo do_shortcode('[CP_APP_HOUR_BOOKING_ADMIN]')?>
  </div>
</div>

<?php get_footer(); ?>
