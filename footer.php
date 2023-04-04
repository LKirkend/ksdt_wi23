<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package KSDT_WI23
 */

?>
</body>

<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://public.radio.co/playerapi/jquery.radiocoplayer.min.js"></script>
<script type="text/javascript">
	var player = $('.radioplayer').radiocoPlayer();
	var toggleButton = $('play-button');
	//var onAir = HOW;
	function togglePlay(){
		player.playToggle(
			function(event){
				document.getElementById('radio-toggle').className = "pause-button";
				//toggleButton.css('content', 'url("img/logos/playbutton.svg")');
			}, 
			function(event){
				document.getElementById('radio-toggle').className = "play-button";
				//toggleButton.css('content', 'url("img/logos/pausebutton.svg")');
			});
	}

</script>

<nav class="navbar fixed-bottom footer-cheight" style="background-color: var(--black)">

<nav class="navbar footer-cheight w-100" style="background-color: var(--black)">

	<div class="container-fluid">
		<span class="navbar-text align-text-bottom me-auto" id="views"> The views presented on this website are not necessarily those of The University of California Regents, The University of California San Diego, or KSDT Radio. </span>
		<span class="navbar-text align-text-bottom ms-auto pe-5" id="contact"> CONTACT <br /> 
			Email: gm@ksdt.org <br /> 
			Phone: (858) 534-KSDT <br /> 
			<a href="https://www.instagram.com/ksdtradio/"><img id="insta-logo" class="ms-3 mt-2"></a> 
			<a href="https://twitter.com/RADIOKSDT"><img id="twitter-logo" class="ms-3 mt-2"></a> 
			<a href="https://www.flickr.com/photos/138845705@N02/albums/"><img id="flickr-logo" class="ms-3 mt-2"></a> 
			<a href="https://www.facebook.com/KSDTCollegeRadio/"><img id="fb-logo" class="ms-3 mt-2"></a> 
		</span>
	</div>
</nav>


<?php wp_footer(); ?>
</html>
