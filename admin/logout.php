<?php
$page = "logout";
include 'includes/header.php';

// remove all session variables
session_unset(); 
// destroy the session 
session_destroy(); 

header('Refresh: 5; URL=../index.php');

?>

<div class="card shadow--3dp">
<p>
You have succesfully logged out returning to home page in <span id="counter">5</span> seconds.
</p>
</div>

<?php include 'includes/footer.php'; ?>

<script type="text/javascript">
function countdown() {
    var i = document.getElementById('counter');
    if (parseInt(i.innerHTML)<=0) {
        location.href = '../index.php';
    }
    i.innerHTML = parseInt(i.innerHTML)-1;
}
setInterval(function(){ countdown(); },1000);
</script>