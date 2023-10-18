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
		<span class="navbar-text align-text-bottom ms-auto pe-2" id="contact">
			<div class="container">
				<div class="row text-end"><div>CONTACT</div></div> 
				<div class="row py-1"><a class="text-end" href="mailto:submissions@ksdt.org">Song Submissions</a> </div>
				<div class="row py-1"> <a class="text-end" href="mailto:gm@ksdt.org">Manager</a></div>
				<div class="row text-end py-1"><div>Phone: (858) 534-KSDT</div></div>
				<div class="row align-items-start pt-1">
					<a class="col" href="https://www.instagram.com/ksdtradio/"><img id="insta-logo" ></a> 
					<a class="col" href="https://www.youtube.com/@radioksdt4024"><img id="yt-logo" ></a> 
					<a class="col" href="https://twitter.com/RADIOKSDT"><img id="twitter-logo" ></a> 
					<a class="col" href="https://www.flickr.com/photos/138845705@N02/albums/"><img id="flickr-logo" ></a> 
					<a class="col" href="https://www.facebook.com/KSDTCollegeRadio/"><img id="fb-logo" ></a> 
				</div>
			</div>
		</span>
	</div>
</nav>

<audio id="radioplayer" src="https://s4.radio.co/s2c33c7adb/listen" preload="auto" muted="true"></audio> <!-- Regular -->
<audio id="sportsplayer" src="https://s4.radio.co/sdb5184873/listen" preload="auto" muted="true"></audio> <!-- Sports -->


<?php if(is_page('home') || is_page('broadcast')) { ?>
	<script type="text/javascript">
			var player = document.getElementById('radioplayer');
			var toggleButton = document.getElementById('radio-toggle');
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

<?php if(is_page('sports')) { ?>
	<script type="text/javascript">
			var player = document.getElementById('sportsplayer');
			var toggleButton = document.getElementById('radio-toggle');

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