<header class="shadow--6dp">
				<span id="name">GAMeNeTiCs</span>
					<container id="nav">
					<button id="home" onclick="selectButton('#home')" <?php if ($page == "home") {?> class="active" <?php ;} ?>>
							<a href="index.php"><i class="fas fa-home"></i> Home</a></button>
						<button id="articles" onclick="selectButton('#articles')" <?php if ($page == "articles") {?> class="active" <?php ;} ?>>
							<a href ="articles.php"><i class="far fa-newspaper"></i> Articles</a></button>
						<button id="about" onclick="selectButton('#about')" <?php if ($page == "about") {?> class="active" <?php ;} ?>>
							<a href="about.php"><i class="fas fa-info-circle"></i> About</a></button>
						<button id="contact" onclick="selectButton('#contact')" <?php if ($page == "contact") {?> class="active" <?php ;} ?>>
						<a href="contact.php"><i class="fas fa-file-signature"></i> Contact</a></button>
					</container>
				<img src="images/placeholder-logo.png" id="logo">
		</header>			