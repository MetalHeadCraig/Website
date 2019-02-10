<?php
$page = "home";
include 'includes/overall/header.php'; 
?>


		<center><h1>Welcome to Gamenetics!</h1></center>

		<div class="row">
			<center><h3>Latest</h3></center>
			<?php
				try {
					$data = $conn->query("SELECT * FROM article ORDER BY id DESC LIMIT 4")->fetchAll();

					foreach ($data as $row) {
						$sql = "SELECT firstname, lastname FROM users WHERE id = :id";
						$stmt = $conn->prepare($sql);    
							//Bind value.
							$stmt->bindValue(':id', $row['author']);  
							//Execute.
							$stmt->execute();
							$author = $stmt->fetch(PDO::FETCH_ASSOC);
							?>
				
							<div class="column shadow--3dp card">
							<h4> <?php echo $row['aname']; ?></h4>
							<span style="float: left">Written by <a href="#"><?php echo $author['firstname'] . " " . $author['lastname']; ?></a></span>
							<span class=date> <?php echo date('M d, Y',strtotime($row['adate'])); ?> </span><br>
							<hr>

                            <?php
                            $string = $row['article'];
                            if (strlen($string) > 100) {
                                $trimstring = substr($string, 0, 100). ' <a href="articles.php?article=' . $row['id'] . '">...Read More</a>';
                            } else {
                                $trimstring = $string;
                            }
                            echo $trimstring;                            
                            ?>

							</div>
				<?php
					}
				}
				catch(PDOException $e) {
					echo "Error: " . $e->getMessage();
				}
				$conn = null;
			?>
		</div>
		<div style="float: right;">
			<a href="articles.php">View more articles from the Archive</a>
		</div>
			
			<br>

		<div class="row">
			<center><h3>Social Feed</h3></center>
  			<div class="scolumn shadow--3dp card">
					<h4><b>Facebook</b></h4>
					<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fsnvgs&tabs=timeline&width=400&height=500&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="400" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
			</div>
			<div class="scolumn shadow--3dp card">
					<h4><b>Twitter</b></h4>
					<a class="twitter-timeline" data-width="400" data-height="500" data-chrome="nofooter" href="https://twitter.com/snvgs?ref_src=twsrc%5Etfw">Tweets by Gamenetics</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
			</div>
		</div>
		<br>

<?php include 'includes/overall/footer.php'; ?>

