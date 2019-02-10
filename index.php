<?php
$page = "home";
include 'includes/overall/header.php'; 
?>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v3.2';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

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
                            if (strlen($string) > 700) {
                                $trimstring = substr($string, 0, 700). ' <a href="#">...Read More</a>';
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

<script>
$(window).on('resize', function() {
   setTimeout(function(){CMSSpace.changeFBPagePlugin()}, 500);
});
 
$(window).on('load', function() {
   setTimeout(function(){CMSSpace.changeFBPagePlugin()}, 1500);
});

CMSSpace.changeFBPagePlugin = function () {
   //getting parent box width
   var container_width = (Number($('.fb-column').width()) - Number($('.fb-column').css('padding-left').replace("px", ""))).toFixed(0);
   //getting parent box height
   var container_height = (Number($('.fb-column').height()) - (Number($('.fb-column-header').height()) + Number($('.fb-column-   header').css('margin-bottom').replace("px", "")) + Number(($('.fb-column').css('padding-top').replace("px", "")*2)))).toFixed(0);
   if (!isNaN(container_width) && !isNaN(container_height)) {
      $(".fb-page").attr("data-width", container_width).attr("data-height", container_height);
   }
   if (typeof FB !== 'undefined' ) {
      FB.XFBML.parse();
   }
}
</script>

