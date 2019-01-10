<link rel="stylesheet" href="css/contact.css" />
<?php 
$page = "contact";
include 'includes/overall/header.php'; 
?>
    <h1>Contact Us</h1>
	<div class="form shadow--3dp">
            <form>
                    <label>Name</label>
                    <input name="Name" placeholder="John Doe">

                    <label>Email</label>
                    <input name="email" type="email" placeholder="johndoe@somewhere.com">
                            
                    <label>Subject</label>
                    <input name="subject" placeholder="I love your show">
                            
                    <label>Message</label>
                    <textarea name="message" placeholder="Message..."></textarea>

                    <input id="submit" name="submit" type="submit" value="Submit">
                
            </form>
    </div>
   <div class="contact shadow--3dp">
       <p>Some stuff can go here</p>
       <br>
       <br>
       <p>Press contact</p>
       <br>
       <br>
    </div>

<?php include 'includes/overall/footer.php'; ?>