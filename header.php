<?php
/**
 * The header for our theme
 *
 * Designers: Neda Emdad
 * Authors: Logan Kirkendall, Chloe Keggen
 *
 * @package KSDT_WI23
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="https://gmpg.org/xfn/11">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <meta name="author" content="KSDT Radio">
	<?php wp_head(); ?>
    <style type ="text/css">
        .dropdown:hover .dropdown-menu{
            display: block
        }
    </style>
</head>


<body class="gifbg bgtemp">
    <!-- <div id="loader"></div> -->
    <!-- Using https://getbootstrap.com/docs/5.3/components/navbar/ as a reference -->
    <nav class="navbar navbar-expand-lg navbar-cheight sticky-top" style="background-color: var(--black)" role="navigation" id="nav-header">
        <div class="container-fluid">
            <!-- Logo -->
            <a class="navbar-brand" id="navbar-adjLogo" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img id="nav-ksdt"></a>
            
            <!-- Collapse Button -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Menu items (items being collapsed) -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- OnAir -->
                <a class="navbar-brand d-none d-onair-block d-lg-blockpx-0" href="https://s4.radio.co/s2c33c7adb/listen"><img id="nav-onair"></a>
                <ul class="navbar-nav ms-auto pe-4">
                    <!-- For each item in the 'Main' menu (on wp-admin), create a <li> -->
                    <?php $main_menu = wp_get_nav_menu_items('Main'); ?>
                        <?php foreach ((array) $main_menu as $key => $menu_item): ?>
                            <?php
                            $title = strtoupper($menu_item->title);
                            $url = $menu_item->url;
                            ?>
                        <?php if($title == 'BROADCAST') : ?>
                            <li class="nav-item align-middle mx-auto py-2 dropdown" id="nav-item-padding">
                                <a href="<?php echo $url; ?>" class="nav-link text-white dropdown-toggle nav-link-bordered" id=" navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    RADIO
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a href="http://localhost/wordpress/broadcast/" class="dropdown-item">BROADCAST</a></li>
                                <li><a href="http://localhost/wordpress/broadcast/sports/" class="dropdown-item">SPORTS</a></li>
                            </ul>
                            </li>
                        <?php else : ?>
                            <li class="nav-item align-middle mx-auto py-2" id="nav-item-padding">
                                <a class="nav-link text-white" id="nav-link-bordered" href="<?php echo $url; ?>"><?php echo $title; ?></a>
                            </li>
                        <?php endif;?>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </nav>
    <section role="main" id="main-sec">
    <script> 
        // Loading 
        const imageUrl = "<?php echo get_stylesheet_directory_uri(); ?>" + "/img/gif/backgroundflip.gif";
        const bgElement = document.querySelector("body");

        let preloaderImg = document.createElement("img");
        preloaderImg.src = imageUrl;

        preloaderImg.addEventListener('load', (event) => {
            bgElement.classList.add("thegif");
            bgElement.classList.remove("bgtemp");
            preloaderImg = null;
        
        });
    </script>