<?php 
$page = "contact";
include 'includes/overall/header.php'; 
?>
<link rel="stylesheet" href="css/contact.css" />
    <h1>Contact Us</h1>
	<div class="card shadow--3dp">
            <form method="Post">
                    <label>Name</label>
                    <input name="Name" placeholder="John Doe">

                    <label>Email</label>
                    <input name="email" type="email" placeholder="johndoe@somewhere.com">
                            
                    <label>Subject</label>
                    <input name="subject" placeholder="I love your show">
                            
                    <label>Message</label>
                    <textarea name="message" placeholder="I am an expanding box.
I only expand vertically.
I adjust based on the amount of text that overflows
100px
in
height"></textarea>

                    <input id="reset" name="reset" type="reset" value="Reset">

                    <input id="submit" name="submit" type="submit" value="Submit">
                
            </form>
    </div>
   <div class="card shadow--3dp">
       <p>Some stuff can go here</p>
       <br>
       <br>
       <p>Press contact</p>
       <br>
       <br>
    </div>

<?php include 'includes/overall/footer.php'; ?>