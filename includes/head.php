	<head>
		<title>Gamenetics</title>
        <meta name="google-site-verification" content="7s0OjefQJi5_pszGGiOKOXaaYhm5XtltCJ3jzDYMqCs" />
        <meta name="msvalidate.01" content="E68D26291EE56F4AE5A5010B6DD21716" />
        
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta charset="utf-8">
                <meta name="description" content="Swindon based video game journalism, articles, podcast, radio, audio, all of it can be found right here" />

        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
		integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/"
		crossorigin="anonymous">
		
		<!-- the main style sheet -->
		<link rel="stylesheet" type="text/css" href="css/main.css">
		
		<!-- add the corresponding styles to the pages -->
        <?php 
        if(basename($_SERVER['PHP_SELF']) == 'articles.php'){ ?>
            <link rel="stylesheet" type="text/css" href="css/articles.css">
        <?php } 
        else if(basename($_SERVER['PHP_SELF']) == 'contact.php'){  ?>
            <link rel="stylesheet" type="text/css" href="css/contact.css">
            <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <?php } 
        else if(basename($_SERVER['PHP_SELF']) == 'profile.php'){  ?>
            <link rel="stylesheet" type="text/css" href="css/profile.css">
        <?php } ?>

        
        <link rel="icon" type="image/png" href="../images/logo-black.png" sizes="16x16">  
		<link rel="icon" type="image/png" href="../images/logo-black.png" sizes="32x32">  
		<link rel="icon" type="image/png" href="../images/logo-black.png" sizes="96x96">
	</head>