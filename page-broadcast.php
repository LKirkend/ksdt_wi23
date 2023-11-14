<?php
/**
 * The broadcast page
 *
 * Designers: 
 * Authors: Zach Lawrence, Logan Kirkendall
 * 
 * @package ksdt_wi23
 */

get_header();
?>

<div class="container-flex overflow-x-hidden">
	<div class="row w-100 mx-3 mx-md-2 mx-xxl-5 w-auto mt-5">
		<div class="col-xl p-0 me-xl-2 me-xxl-5 mb-4 rainbox" id="played-recent">
			<div class="container-flex mx-3 mx-sm-1 mx-md-5 mx-xl-1 mx-xxl-5 mt-5">
				<div class="row text-center pb-5">
					<div class="col">
						<h1 style="text-shadow: 0px 4px 4px var(--shadow);">Played Last</h1>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<div id="spin-recent">
							<?php include __DIR__ . '/spinitron/widgets/recent-spins.php'; 
							?>
						
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl p-0 ms-xl-2 ms-xxl-2 mx-auto mb-4 rainbox" id="playing-next-cont">
			<div class="row my-5 mx-auto text-center">
				<div class="col"><h1 style="text-shadow: 0px 4px 4px var(--shadow);">Playing Next</h1></div>
			</div>
			<div class="container-flex mx-3 mx-sm-1 mb-5 mx-md-5 mx-xl-1 mx-xxl-5 p-0" id="playing-next">
				<div class="row">
					<div class="col">
						<div id="spin-upcoming">
							<?php
							//testing- it prints 
							// $fileinfo = glob('../../../media/2022*');
							// print_r($fileinfo);
							?>
							<form action="search.php">
								<input type="text" name="Search" placeholder="Audio yyyy-mm-dd-hh">
								<button type="submit">Search</button>
							</form>
						
						<?php 
							if(isset($_POST['submit-search'])) {
								$search = mysqli_real_escape_string($conn, $_POST['Search']);
								echo preg_match($search, '../../../media*');
							}
							?>
							<?php include(__DIR__ . '/spinitron/widgets/upcoming-shows.php')
							
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row mb-5 w-100 mx-3 mx-md-2 mx-xxl-5 mt-xxl-4 w-auto" id="sched-cont">
		<div class="col rainbox">
			<div class="row my-3">
				<div class="col text-center"><h1>Schedule</h1></div>
			</div>
			<div class="row">
				<div class="col mx-auto">
					<!-- DJ Schedule -->
					<div class="mx-md-4 mb-4">
						<iframe style="width: 100%; height: 1564px;" src="//widgets.spinitron.com/widget/schedule?station=ksdt"></iframe>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>