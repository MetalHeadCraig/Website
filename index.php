<?php include 'includes/overall/header.php'; ?>

		<center><h1>Welcome to Show Name!</h1></center>

		<div class="row">
			<center><h3>Latest</h3></center>
			<?php
				$k = 2;
				for ($i=0; $i<3; $i++) { 					
					
			?>
					<div class="column">
						<div class="card">
							<h4><b>Article Name</b></h4> 
							<p>Some text information regarding an Article that was put up by one of us, This is being generated by a for
								loop and the articles will be displayed by reading from a database, most likely going to be MYSQL because
								you know, Reasons!. Now would you kindly read this again a further <?php echo $k; ?> more times before 
								reaching the empty social network feed boxes.</p> 
						</div>
					</div>
					<br>
			<?php
				$k--;
				}
			?>
		</div>

		<div class="row">
			<center><h3>Social Feed</h3></center>
  			<div class="social-column">
    			<div class="card">
					<h4><b>Facebook</b></h4>
				</div>
			</div>
			<div class="social-column">
    			<div class="card">
					<h4><b>Twitter</b></h4>
				</div>
			</div>
		</div>

<?php include 'includes/overall/footer.php'; ?>
