<?php
$page = "Admin";
include 'includes/header.php';

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

<h1>Admin portal!</h1>

<div class="card shadow--3dp">
<h3><span id="welcome"></span><?php echo $data['firstname'] . "!"; ?></h3>

<ul>
<li><a href="#">Update detalis</a></li>
<li><a href="#">Change Password</a></li>
<li><a href="#">Add Article</a></li>
<li><a href="logout.php">Log out</a></li>
</ul>

<?php
if ($data['userlvl'] == 1) { ?>
<p>If user is Craig, Tim or Cameron show advanced stuff like, Website traffic, and other stuff I can't think of at the moment.</p>


<?php
    } 
?>

</div>
<?php include 'includes/footer.php'; ?>

<script>
    var greeting;
var time = new Date().getHours();
	if (time < 12) {
	greeting = "Good Morning, ";
	} else if (time < 18) {
	greeting = "Good Afternoon, ";
	} else {
	greeting = "Good Evening, ";
	}
document.getElementById("welcome").innerHTML += greeting;
</script>