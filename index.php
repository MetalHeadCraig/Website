<?php
$page = "home";
include 'includes/overall/header.php'; 
?>

		<center><h1>Welcome to Show Name!</h1></center>

		<div class="row">
			<center><h3>Latest</h3></center>
			<?php
				try {
					$data = $conn->query("SELECT * FROM article")->fetchAll();

					foreach ($data as $row) {
						// start the column, shadow and card class for the articles
						echo "<div class=\"column shadow--3dp card\">";
						// pull the article name from the database
						echo "<h4>".$row['aname']."</h4>";
						// This will eventually take in the user id and convert to their name and made clickable to go to profile
						echo "<span style=\"float: left;\">Written by Admin</span>"; 
						// use the date class from the css file
						echo "<span class=\"date\">";
						// format and pull the date from the database
						echo date('F d, Y. h:m A',strtotime($row['adate']));
						// end the date class
						echo "</span><br />";
						// add a horizontal line
						echo "<hr>";
						// pull the article from the database
						echo $row['article']."<br><br>";
						// add link to read more
						echo "<span style=\"float: right;\"><a href=\"article.php\">Read More</a></span>";
						// end the column, shadow and card class for the articles
						echo "</div>";
					}
				}
				catch(PDOException $e) {
					echo "Error: " . $e->getMessage();
				}
				$conn = null;
			?>
		</div>
		<div style="float: right;">
			<a href="article.php">View more articles from the Archive</a>
		</div>
			
			<br>

		<div class="row">
			<center><h3>Social Feed</h3></center>
  			<div class="column shadow--3dp card">
					<h4><b>Facebook</b></h4>
					<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FSNVGS%2F&tabs=timeline%2Cevents%2Cmessages&width=340&height=500&small_header=true&adapt_container_width=true&hide_cover=true&show_facepile=true&appId=156184084430790" width="340" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
			</div>
			<div class="column shadow--3dp card">
					<h4><b>Twitter</b></h4>
					<a class="twitter-timeline" data-height="500" data-theme="dark" href="https://twitter.com/SNVGS"></a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
			</div>
		</div>
		<br>

<?php include 'includes/overall/footer.php'; ?>

