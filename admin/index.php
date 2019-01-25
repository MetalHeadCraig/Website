<?php
$page = "Admin";
include 'includes/header.php';

//check if user is logged in
if(!isset($_SESSION['user_id']) || !isset($_SESSION['logged_in'])){
    //User not logged in. Redirect them back to the login.php page.
    header('Location: login.php');
    exit;
}

//Retrieve the user account information for the given session.
$sql = "SELECT * FROM users WHERE id = :id";
$stmt = $conn->prepare($sql);    
//Bind value.
$stmt->bindValue(':id', $_SESSION['user_id']);    
//Execute.
$stmt->execute();    
//Fetch row.
$data = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<h3><span id="welcome"></span><?php echo $data['firstname'] . "!"; ?></h3>

<ul>
<li class="shadow--3dp"><a href="#"><i class="fas fa-user-alt"></i><div>  Update details</div></a></li>
<li class="shadow--3dp"><a href="changepassword.php"><i class="fas fa-key"></i><div>  Change Password</div></a></li>
<li class="shadow--3dp"><a href="addarticle.php"><i class="fas fa-address-card"></i><div>  Add Article</div></a></li>
<li class="shadow--3dp"><a href="logout.php"><i class="fas fa-sign-out-alt"></i><div>  Log out</div></a></li>
</ul>

<?php
if ($data['userlvl'] == 1) { ?>
<!--<p>If user is Craig, Tim or Cameron show advanced stuff like, Website traffic, and other stuff I can't think of at the moment.</p>
-->

<?php
    } 
?>

<?php include 'includes/footer.php'; ?>