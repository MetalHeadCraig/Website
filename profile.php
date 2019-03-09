<?php
include 'includes/cache.php';
$page = "Profile";
include 'includes/overall/header.php';

if (isset ($_GET['firstname']) && ($_GET['lastname'])) {
    
$sql = "SELECT * FROM users WHERE firstname = :first AND lastname = :last";
$stmt = $conn->prepare($sql);    
//Bind value.
$stmt->bindValue(':first', $_GET['firstname']); 
$stmt->bindValue(':last', $_GET['lastname']);
//Execute.
$stmt->execute();    
//Fetch row.
$user = $stmt->fetch(PDO::FETCH_ASSOC);

$sql = "SELECT * FROM profile WHERE userid = :id";
$stmt = $conn->prepare($sql);    
//Bind value.
$stmt->bindValue(':id', $user['id']); 
//Execute.
$stmt->execute();    
//Fetch row.
$profile = $stmt->fetch(PDO::FETCH_ASSOC);

?>

    <h1><?php echo $user['firstname'] . " " . $user['lastname']; ?></h1>

    <div class="card shadow--3dp">
    
    <div class="details">
    <div class="bio card shadow--3dp">
        

        
    <div class="profileimage shadow--3dp">
    <?php
        if (isset($profile['profilepic']) && !empty($profile['profilepic'])) {
            echo "<img src='images/profile/" . $profile['profilepic'] . "' width='100%' height='auto'></a>";
        } else {
            echo "<img src='images/profile/profile-feature-template-1.jpg' width ='100%' height = 'auto'></a>";
        }
?>
    </div>

    <br>
    
        <?php
        if (isset($profile['bio']) && !empty($profile['bio'])) {
            echo $profile['bio'];
        } else {
            echo "This information has not been provided.";
        }
?>

    <br><br>

    </div>

    <div class="articles-by card shadow--3dp">
    
    <h3><?php echo $user['firstname']; ?> has written these awesome articles you should totally check out!</h3>
    
    <?php
    $sql = "SELECT COUNT(id) FROM article WHERE author = :userid";
    $stmt = $conn->prepare($sql);
    //Bind value.
    $stmt->bindValue(':userid', $user['id']);  
    //Execute.
    $stmt->execute();
    $articleno = $stmt->fetchColumn();

    if ($articleno == 0) { ?>
    <p>Oh dear! it looks like <?php echo $user['firstname'] ?> hasn't written any articles yet.<br>
    Maybe you should send an email to try and get them to write atleast 1.</p>
    <?php 
    } else { 

    $sql = "SELECT * FROM article WHERE author = :userid ORDER BY id DESC";
    $stmt = $conn->prepare($sql);
    //Bind value.
    $stmt->bindValue(':userid', $user['id']);  
    //Execute.
    $stmt->execute();
    $articles = $stmt->fetchAll();
    
   foreach ($articles as $article) { ?>
       <h5><a href="articles.php?article=<?php echo $article['id']; ?>"> <?php echo $article['aname']; ?></a></h5>
       <?php
   }
    }
    
    ?>

    </div>

    </div>

    </div>
    <?php
} else {
   echo "This is a Custom 404";
}
?>


<?php include 'includes/overall/footer.php'; ?>