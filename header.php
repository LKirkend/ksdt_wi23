<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package KSDT_WI23
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> 
    <meta name="author" content="KSDT Radio">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>


<body class="gifbg">
    <div class="topnav">
        <ul class="navbar">
            <?php $main_menu = wp_get_nav_menu_items('Main'); ?>
                <?php foreach ((array) $main_menu as $key => $menu_item): ?>
                <?php
                $title = strtoupper($menu_item->title);
                $url = $menu_item->url;
                ?>
                <li class="nav-item">
                    <a href="<?php echo $url; ?>"><?php echo $title; ?></a>
                </li>
                <?php endforeach; ?>
        </ul>
    </div>
</body>

