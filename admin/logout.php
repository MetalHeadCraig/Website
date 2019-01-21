<?php
$page = "logout";
include 'includes/header.php';

// remove all session variables
session_unset(); 
// destroy the session 
session_destroy(); 
?>

<div class="card shadow--3dp">
<p>
You have succesfully logged out
</p>
</div>

<?php include 'includes/footer.php'; ?>