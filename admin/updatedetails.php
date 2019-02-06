<?php
$page = "Update";
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

<link rel="stylesheet" href="/css/details.css" />

    <h1>Update your details</h1>

    <div class="details">

    <div class="profileimage shadow--3dp">
    An image you chose goes here
    <button>Update</button>
    </div>

    <div class="card shadow--3dp">
        <form method="Post">
                    <label>Full Name</label>
                    <input name="Name" placeholder="John Doe" value="<?php echo $data['firstname'] . " " . $data['lastname']; ?>">

                    <label>Email</label>
                    <input name="email" type="email" value="<?php echo $data['email']; ?>">
                                                
                    <label>Mini Bio</label>
                    <textarea name="message" placeholder="I am an expanding box.
I only expand vertically.
I adjust based on the amount of text that overflows
100px
in
height"></textarea>

                    <input id="submit" name="submit" type="submit" value="Submit">
                
        </form>
    </div>

    </div>

<?php include 'includes/footer.php'; ?>