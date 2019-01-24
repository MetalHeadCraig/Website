<?php
$page = "Login";
include 'includes/header.php';

//If the POST var "login" exists (our submit button), then we can
//assume that the user has submitted the login form.
if(isset($_POST['login'])){
    
    //Retrieve the field values from our login form.
    $email = !empty($_POST['email']) ? trim($_POST['email']) : null;
    $passwordAttempt = !empty($_POST['password']) ? trim($_POST['password']) : null;
    
    //Retrieve the user account information for the given email.
    $sql = "SELECT * FROM users WHERE email = :email";
    $stmt = $conn->prepare($sql);    
    //Bind value.
    $stmt->bindValue(':email', $email);    
    //Execute.
    $stmt->execute();    
    //Fetch row.
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    //If $row is FALSE.
    if($user === false){
        //Could not find a user with that email!
        //PS: You might want to handle this error in a more user-friendly manner!
        die('Incorrect email / password combination!');
    } else{
        //User account found. Check to see if the given password matches the
        //password hash that we stored in our users table.        
        //Compare the passwords.
        $validPassword = password_verify($passwordAttempt, $user['password']);
        
        //If $validPassword is TRUE, the login has been successful.
        if($validPassword){            
            //Provide the user with a login session.
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['logged_in'] = time();
            
            if($user['userlvl'] == -1){
                // First time login, prompt to change password
                header('Location: changepassword.php');
            } else {
                //Redirect to our admin page
                header('Location: index.php');
            exit;
            }
            
        } else{
            //$validPassword was FALSE. Passwords do not match.
            die('Incorrect email / password combination!');
        }
    }
}
?>

<h3>Login</h3>

<form action="login.php" method="post">

  <div class="input-container">
    <i class="fa fa-envelope icon"></i>
    <input type="text" id="email" name="email" class="input-field" placeholder="Email">
  </div>

  <div class="input-container">
    <i class="fa fa-key icon"></i>
    <input type="password" id="password" name="password" class="input-field" placeholder="Password" >
    <i toggle="#password" class="far fa-eye sp fa-1x toggle-password"></i>
  </div>

 <button class="btn" type="submit" id="login" name="login">Login</button>
</form>

<?php include 'includes/footer.php'; ?>