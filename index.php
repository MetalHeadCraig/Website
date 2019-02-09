<?php
$page = "home";
include 'includes/overall/header.php'; 
?>

		<center><h1>Welcome to Show Name!</h1></center>

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
							<?php echo $row['article'] . "<br><br>"; ?>
							<span style="float: right"><a href="#">Read More</a></span>
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

