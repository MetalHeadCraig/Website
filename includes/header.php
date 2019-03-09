<header class="shadow--6dp">
				<span id="name"><a href="../index.php">GAMeNeTiCs<a></span>
					<div id="nav">
					<a href="../index.php"><button id="home" onclick="selectButton('#home')" <?php if ($page == "home") {?> class="active" <?php ;} ?>>
							<i class="fas fa-home"></i> Home</button></a>
					<a href="../articles.php"><button id="articles" onclick="selectButton('#articles')" <?php if ($page == "articles") {?> class="active" <?php ;} ?>>
							<i class="far fa-newspaper"></i> Articles</button></a>
					<a href="../about.php"><button id="about" onclick="selectButton('#about')" <?php if ($page == "about") {?> class="active" <?php ;} ?>>
							<i class="fas fa-info-circle"></i> About</button></a>
					<a href="../contact.php"><button id="contact" onclick="selectButton('#contact')" <?php if ($page == "contact") {?> class="active" <?php ;} ?>>
						<i class="fas fa-file-signature"></i> Contact</button></a>
					</div>
				<img src="../images/logo.png" id="logo" alt="logo">
		</header>			
		<br>