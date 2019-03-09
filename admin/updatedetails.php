<?php
$page = "Update";
include 'includes/cache.php';
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

if (isset($_POST["profilepic"])) {
// process profile image
$profilepic     = $_FILES["profilepic"]["name"];
try {
 $sql = "INSERT INTO profile (userid, profilepic) VALUES (:userid, :pp) ON DUPLICATE KEY UPDATE profilepic = :pp";
    $stmt = $conn->prepare($sql);  
    $stmt->bindValue(':userid', $data['id']);
    $stmt->bindValue(':pp', $profilepic);
    //Execute.
    $stmt->execute();  
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$target_dir = "../images/profile/";
$target_file = $target_dir . basename($_FILES["profilepic"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["profilepic"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["profilepic"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["profilepic"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["profilepic"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
}


if(isset($_POST['update'])){

    //Retrieve the field values from our articles form.
    $bio            = ($_POST['bio']);
    
    
try {
    $sql = "INSERT INTO profile (userid, bio) VALUES (:userid, :bio) ON DUPLICATE KEY UPDATE bio = :bio";
    $stmt = $conn->prepare($sql);  
    $stmt->bindValue(':userid', $data['id']);
    $stmt->bindValue(':bio', $bio); 
    //Execute.
    $stmt->execute();  
    echo "Detailes updated sucessfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
} else {

$sql = "SELECT * FROM profile WHERE userid = :id";
$stmt = $conn->prepare($sql);    
//Bind value.
$stmt->bindValue(':id', $data['id']);    
//Execute.
$stmt->execute();    
//Fetch row.
$profile = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<link rel="stylesheet" href="/css/details.css" />

    <h1>Update your details</h1>

    <div class="details">

    <div class="profileimage shadow--3dp">
    An image you chose goes here, max size is 5 MB
    <form method="post" enctype="multipart/form-data">
    <input type="file" name="profilepic" id="profilepic">
    <button type ="submit" name="profilepic">Update</button>
    </form>
    </div>

    <div class="card shadow--3dp">
        <form method="Post">
                    <label>Full Name</label>
                    <input name="Name" placeholder="John Doe" value="<?php echo $data['firstname'] . " " . $data['lastname']; ?>">

                    <label>Email</label>
                    <input name="email" type="email" value="<?php echo $data['email']; ?>">
                                                
                    <label>Mini Bio</label>
                    <textarea name="bio" placeholder="I am an expanding box.
I only expand vertically.
I adjust based on the amount of text that overflows
100px
in
height" value="<?php echo $profile['bio']; ?>"></textarea>

                    <input id="submit" name="update" type="submit" value="Update Details">
                
        </form>
    </div>

    </div>

<?php 
}
include 'includes/footer.php'; 
?>