<?php 
$page = "contact";
include 'includes/cache.php';
include 'includes/overall/header.php'; 
?>
    <h1>Contact Us</h1>

	<div class="card shadow--3dp">
            <form method="Post" id="public">
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

                    <input id="send" name="send" type="submit" value="Submit" class="g-recaptcha"
                    data-sitekey="6LdJG5QUAAAAAKIp-yfH5nLJiiS-MBhZxIvrUgoB" data-callback="onSubmit" data-badge="bottomleft">

<?php 
    // reCaptcha related variables
    
    
    if (isset($_POST['g-recaptcha-response'])){
    // reCaptcha info
    $key = "6LdJG5QUAAAAAO1_3rWU0vlXMBFAqfsW9pRgRZa_";
    $url = "https://www.google.com/recaptcha/api/siteverify";
    $captcha = $_POST['g-recaptcha-response'];
    
    $recaptcha_response = file_get_contents($url.'?secret='.$key.'&response='.$captcha);


    
    // phpMail
    if ($data = json_decode($recaptcha_response, true)){
    $to = "info@gamenetics.uk"; // this is the mailbox for the contact form
    $from = $_POST['email']; // this is the sender's Email address
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $message = $name . " wrote the following:" . "\n\n" . $_POST['message'];
    $headers = "From:" . $from;
    
    
    if (!empty($_POST['message'])) {

// test to see if it is possible to send the email
    if(@mail($to, $subject, $message, $headers))
{
    echo '<script type="text/javascript"> window.alert("Looks like that worked! We are as surprised as you are. A member of the team will contact you shortly."); {window.location.href = "index.php"}; </script>';
}
}
else {
   echo '<script type="text/javascript"> window.alert("Looks like there was an issue here. Please click the link below to send an email and let us know so we can get this fixed");</script>';
}
    }
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
    

<script>// check reCAPTCHA on click of submit button on contact form
function onSubmit(token) {
         document.getElementById("public").submit();
       }</script>
<?php include 'includes/overall/footer.php'; ?>