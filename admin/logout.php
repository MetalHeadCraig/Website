<?php
$page = "logout";
include 'includes/header.php';

// remove all session variables
session_unset(); 
// destroy the session 
session_destroy(); 

header('Refresh: 5; URL=../index.php');

?>

<p>
You have succesfully logged out returning to home page in <span id="counter">5</span> seconds.
</p>

<?php include 'includes/footer.php'; ?>

<script type="text/javascript">

</script>