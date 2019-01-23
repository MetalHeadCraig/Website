<?php
$page = "change password";
include 'includes/header.php';

//check if user is logged in
if(!isset($_SESSION['user_id']) || !isset($_SESSION['logged_in'])){
    //User not logged in. Redirect them back to the login.php page.
    header('Location: login.php');
    exit;
}

if(isset($_POST['changepassword'])){
    
     //Retrieve the field values from our change password form.
     $password       = !empty($_POST['password'])        ? trim($_POST['password']) : null;
     $newpassword    = !empty($_POST['newpassword'])     ? trim($_POST['newpassword']) : null;
     $passwordverify = !empty($_POST['passwordverify'])  ? trim($_POST['passwordverify']) : null;
     
     
     //Retrieve the users password.
     $sql = "SELECT password FROM users WHERE id = :id";
     $stmt = $conn->prepare($sql);    
     //Bind value.
     $stmt->bindValue(':id', $_SESSION['user_id']);    
     //Execute.
     $stmt->execute();    
     //Fetch row.
     $user = $stmt->fetch(PDO::FETCH_ASSOC);
 
     //Check if current passwod matches the database.
     if(password_verify($password, $user['password'])) {
        if($newpassword == $passwordverify) {
            // Process the update of password
            echo "New password and Confirm password match";
        } else {
            // Output message if New and Confirm password do not match
            echo "New password and Confirm password do not match";
        }
     } else {
         // Output message if current password is incorrect
         echo "Cannot change password as your current password is incorrect";
     }
}
?>

<h3>Change Password</h3>

<form action="changepassword.php" method="post">
<div class="input-container">
    <i class="fa fa-key icon"></i>
    <input type="password" id="password" name="password" class="input-field" placeholder="Current Password" >
    <i toggle="#password" class="far fa-eye sp fa-1x toggle-password"></i>
</div>

<div class="input-container">
    <i class="fa fa-key icon"></i>
    <input type="password" id="newpassword" name="newpassword" class="input-field" placeholder="New Password" >
    <i toggle="#newpassword" class="far fa-eye sp fa-1x toggle-password"></i>
</div>

<div class="input-container">
    <i class="fa fa-key icon"></i>
    <input type="password" id="passwordverify" name="passwordverify" class="input-field" placeholder="Confirm Password" >
    <i toggle="#passwordverify" class="far fa-eye sp fa-1x toggle-password"></i>
</div>
<button class="btn" type="submit" name="changepassword">Change Password</button>
</form>
  
<?php include 'includes/footer.php'; ?>