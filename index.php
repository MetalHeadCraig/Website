<?php
$page = "home";
include 'includes/cache.php';
include 'includes/overall/header.php'; 
?>

<div id="fb-root"></div>

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
                            $string = preg_replace('/\n/', '<br>', $row['article']);
                            if (strlen($string) > 600) {
                                $trimstring = substr($string, 0, 600). '...<a href="articles.php?article=' . $row['id'] . '">Read More</a>';
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
			<!-- <a href="articles.php">View more articles from the Archive</a> -->
		</div>
			
			<br>

		<div class="row">
			<center><h3>Social Feed</h3></center>
  			<div class="scolumn shadow--3dp card">
					<h4><b>Facebook</b></h4>
<div class="fb-page" data-href="https://www.facebook.com/snvgs" data-tabs="timeline" data-width="300" data-height="500" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/snvgs" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/snvgs">The Video Games Show on Swindon 105.5</a></blockquote></div>
            </div>            
			<div class="scolumn shadow--3dp card">
					<h4><b>Twitter</b></h4>
					<a class="twitter-timeline" data-width="300" data-height="500" data-chrome="nofooter" href="https://twitter.com/snvgs?ref_src=twsrc%5Etfw">Tweets by Gamenetics</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
			</div>
		</div>
		<br>

<?php include 'includes/overall/footer.php'; ?>
	