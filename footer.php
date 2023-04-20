<?php
/**
 * The footer for our theme
 *
 * Designers: Neda Emdad
 * Authors: Logan Kirkendall
 *
 * @package KSDT_WI23
 */

?>
</a> 
</section> <!-- The declarations are within the header> -->
</body>


<nav class="navbar footer-cheight w-100" style="background-color: var(--black)" id="footer-bottom">
	<div class="container-fluid">
		<span class="navbar-text align-text-bottom me-auto" id="views"> The views presented on this website are not necessarily those of The University of California Regents, The University of California San Diego, or KSDT Radio. </span>
		<span class="navbar-text align-text-bottom ms-auto pe-5" id="contact"> CONTACT <br /> 
			<a href="mailto:submissions@ksdt.org">Song Submissions</a><br />
			<a href="mailto:gm@ksdt.org">Manager</a><br /> 
			Phone: (858) 534-KSDT <br /> 
			<a href="https://www.instagram.com/ksdtradio/"><img id="insta-logo" class="ms-2 ms-sm-3 mt-2"></a> 
			<a href="https://twitter.com/RADIOKSDT"><img id="twitter-logo" class="ms-2 ms-sm-3 mt-2"></a> 
			<a href="https://www.flickr.com/photos/138845705@N02/albums/"><img id="flickr-logo" class="ms-2 ms-sm-3 mt-2"></a> 
			<a href="https://www.facebook.com/KSDTCollegeRadio/"><img id="fb-logo" class="ms-2 ms-sm-3 mt-2"></a> 
		</span>
	</div>
</nav>

<audio id="radioplayer" src="https://s4.radio.co/s2c33c7adb/listen" preload="auto" muted="true"></audio>

<?php if(is_page('home') || is_page('broadcast')) { ?>
	<script type="text/javascript">
			var player = document.getElementById('radioplayer');
			var toggleButton = document.getElementById('radio-toggle');
			var onAir = document.getElementById('nav-onair');
			console.log(player);
			function togglePlay(){
				if(player.muted == true){
					player.play();
					player.muted = false;
				}
				else{
					player.pause();
					player.muted = true;
				}
				toggleButton.classList.toggle("pause-button");
				toggleButton.classList.toggle("play-button");
			}
	</script>
<?php } ?>

<?php wp_footer(); ?>
</html>
