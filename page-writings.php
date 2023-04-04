<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ksdt_wi23
 */

get_header();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Writings</title>
    <link rel="stylesheet" href="style.css">
    <style>
        *{
            margin:0;
            padding:0;
        }
        .title_sec{
            min-height: 100vh;
            width: 100%;
        }
        .text-box{
            width: 90%;
            color: #fff;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align:center;
        }
        h1{
            font-family:"Porkys";
            font-size: 64px;
            color: #fff;
        }
        p{
            font-family: "Europa Grotesk SH";
            font-size: 32px;
        }
        /* ----------- spotlight articles ---------*/
        .spotlight_articles{
            width: 100%;
            margin: 0;
            padding:0;
            background-color: #1A1717;
            padding-top:80px;
        }
        .row{
            display: flex;
            justify-content: space-between;
        }
        .blogcol1{
            flex-basis: 44%;
            padding-left: 56px;
        }
        .blogcol2{
            flex-basis: 44%;
            text-align:center;
        }
        .blogcol2 h1{
            font-size:40px;
            padding-right: 72px;
        }
        .bloggrid{
            padding-left:56px;
            padding-right:72px;
        }
        .blogbox{
            display:flex;
            justify-content: space-between;
        }
        /* ------------------ read more section ----------------------*/
        .readmore{
            text-align:center;
            padding-bottom:120.4px;
        }
        .rm{
            padding-top: 120px;
            padding-bottom: 79.82px;
        }
        .rec{
            width: 80%;
            height: 80%;
            left: 1322px;
            top: 1503.82px;
            margin-left:auto;
            margin-right:auto;
            background-color: rgba(26, 23, 23, 0.4);
            box-shadow: 5px 5px 4px rgba(0, 0, 0, 0.25);
            border-radius: 10px;
            border-image: url('img/gif/background.gif');
        }
        .containsblog{
            padding-left: 29px;
            padding-right: 29px;
            padding-top: 36.4px;
            padding-bottom: 35.1px;
            border: 
        }
        .bdp-post-grid-content .bdp-post-categories {
            text-transform: uppercase;
        }
        .bdp-post-grid-content .bdp-post-categories a{
            color: #FFDF50;
            font-size: 16px;
        }
        .bdp-post-grid-main.bdp-design-1 .bdp-post-grid-content{ text-align:left; }
        .bdp-post-content{
            color: #fff;
            font-family: "Europa Grotesk SH";
            font-size: 24px;
        }
        .bdp-post-pagination a, .bdp-post-pagination a{color: #FD0C72; background: transparent;border: 1px solid #fff; border-radius: 12px;font-family: 'Europa Grotesk SH'; font-size: 24px; padding-left: 12px; padding-right: 12px; padding-top:1px; padding-bottom: 1px;}
        .bdp-post-pagination a:hover, .bdp-post-pagination a:focus, .bdp-post-pagination a:hover, .bdp-post-pagination a:focus{color: #fff !important;background: #FD0C72;}
        .bdp-post-pagination .current{color: #fff !important; background: #FD0C72;border-radius: 12px;font-size: 24px; border: 1px solid #fff; font-family: 'Europa Grotesk SH'; padding-left: 12px; padding-right: 12px; padding-top:1px; padding-bottom: 1px;}
        .prev.page-numbers, .next.page-numbers{border: 0px solid #fff;}
        .prev.page-numbers, .next.page-numbers {visibility:hidden; position: relative;}
        .next.page-numbers:before {
            visibility: visible;
            content: "»";
            font-size: 32px;
            font-family: 'Europa Grotesk SH';
        }
        .prev.page-numbers:after{
            visibility: visible;
            content: "«";
            font-size: 32px;
            font-family: 'Europa Grotesk SH';
        }
    </style>
</head>
<body>
    <section class="title_sec">
        <div class="title">
            <div class="text-box">
                <h1>blog</h1>
                <p>check out features by our community</p> 
            </div>
        </div>
    </section>
    <!---------- spotlight articles --------->
    <section class="spotlight_articles">
        <div class="row">
            <div class="bloggrid">
                <?php echo do_shortcode('[bdp_post_gridbox design="design-1" limit="6" show_read_more="false" show_date="false" show_tags="false" pagination="false"]');?>
            </div>
    </section>
    <!---------- read more ------------------>
    <section class="readmore">
        <div class="rm">
            <h1>read more</h1>
        </div>
        <div class="rec"> 
            <div class="containsblog">
                <?php echo do_shortcode('[bdp_post grid="3" design="design1" limit="9" show_tags="false" show_read_more="false" show_date="false" show_content="true"]');?>
            </div>
        </div>
    </section>
</body>
</html>