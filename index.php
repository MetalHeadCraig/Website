<?php
$page = "home";
include 'includes/cache.php';
include 'includes/overall/header.php'; 
?>


		<h1>Welcome to Gamenetics!</h1>

		<div class="row">
			<h3 style="text-align:center;">Latest</h3>
			<?php
				try {
					$data = $conn->query("SELECT * FROM article ORDER BY id DESC LIMIT 4")->fetchAll();

					foreach ($data as $row) {
						$sql = "SELECT * FROM users WHERE id = :id";
						$stmt = $conn->prepare($sql);    
							//Bind value.
							$stmt->bindValue(':id', $row['author']);  
							//Execute.
							$stmt->execute();
							$author = $stmt->fetch(PDO::FETCH_ASSOC);
							?>
				
							<div class="column shadow--3dp card">
							<h4> <?php echo $row['aname']; ?></h4>
							<span style="float: left">Written by <a href="/<?php echo $author['firstname'] . "-" . $author['lastname']; ?>"><?php echo $author['firstname'] . " " . $author['lastname']; ?></a></span>
							<span class=date> <?php echo date('M d, Y',strtotime($row['adate'])); ?> </span><br>
							<hr>
                            
  
                            <?php
                            $string = $row['article'];
                            $string = preg_replace("/<img[^>]+\>/i", "<i>(There is an image here, you should click Read More to see it.) </i>", $string);
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
			<h3 style="text-align:center;">Social Feed</h3>
  			<div class="scolumn shadow--3dp card">
					<h4><b>Facebook</b></h4>
<div class="fb-page" data-href="https://www.facebook.com/snvgs" data-tabs="timeline" data-width="300" data-height="500" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/snvgs" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/snvgs">The Video Games Show on Swindon 105.5</a></blockquote></div>
            </div>            
			<div class="scolumn shadow--3dp card">
					<h4><b>Twitter</b></h4>
					<a class="twitter-timeline" data-width="300" data-height="500" data-chrome="nofooter" href="https://twitter.com/gamenetics_uk?ref_src=twsrc%5Etfw">Tweets by Gamenetics</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
			</div>
		</div>
<div id="fb-root"></div>
<script>
(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v3.2';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
		<br>
		  <div class="card shadow--3dp">
       <h3>We podcast too</h3>
        <p>We also podcast our radio show and YouTube show in all the normal places to get your podcasts from, like this place below</p>
        <br>
        <iframe src="https://open.spotify.com/embed/show/2tWZRLpxWyK42T1emrT5L6" width="80%" height="240" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>
    </div>
    <br>

<?php include 'includes/overall/footer.php'; ?>
	