<?php 
$page = "contact";
include 'includes/cache.php';
include 'includes/overall/header.php'; 
?>
<link rel="stylesheet" href="css/contact.css" />
    <h1>Contact Us</h1>

	<div class="card shadow--3dp">
            <form method="Post">
                    <label>Name</label>
                    <input name="name" placeholder="John Doe" required>

                    <label>Email</label>
                    <input name="email" type="email" placeholder="johndoe@somewhere.com" required>
                            
                    <label>Subject</label>
                    <input name="subject" placeholder="Something about your thing" required>
                            
                    <label>Message</label>
                    <textarea name="message" placeholder="Ask us something special.
Maybe, in future, we will reply to you about something.
It's possible that it may not be related to your initial something but we will try" required></textarea>

                    <input id="reset" name="reset" type="reset" value="Reset">

                    <input id="submit" name="submit" type="submit" value="Submit">

<?php 


 if(isset($_POST['submit'])){
    $to = "info@gamenetics.uk"; // this is the mailbox for the contact form
    $from = $_POST['email']; // this is the sender's Email address
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $message = $name . " wrote the following:" . "\n\n" . $_POST['message'];
    $headers = "From:" . $from;
    

    mail($to, $subject, $message, $headers);

    echo '<script type="text/javascript"> window.alert("Looks like that worked! We are as surprised as you are. A member of the team will contact you shortly."); {window.location.href = "index.php"}; </script>';
    }

 ?>
                
            </form>
   </div>
    
   <div class="card shadow--3dp">
       <p>If you can't use the above form for any reason please click on the relevant link below</p>
       <p>For information about us/the show/something else please <u><a href="mailto:info@gamenetics.uk">click here</a></u> 
       to contact us and we will get back to you as soon as possible.</p>
       <br>
       <p>If you are contacting us regarding any media enquiries please <u><a href="mailto:media@gamenetics.uk">click here</a></u> 
       to contact us.</p>
       <br>
    </div>

 

<?php include 'includes/overall/footer.php'; ?>