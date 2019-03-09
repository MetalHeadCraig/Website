<?php
include 'includes/cache.php';
$page = "Profile";
include 'includes/overall/header.php';

$userid = $_GET['userid'];

$sql = "SELECT * FROM users WHERE id = :id";
$stmt = $conn->prepare($sql);    
//Bind value.
$stmt->bindValue(':id', $userid);    
//Execute.
$stmt->execute();    
//Fetch row.
$user = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<link rel="stylesheet" href="css/profile.css" />

    <h1><?php echo $user['firstname'] . " " . $user['lastname']; ?></h1>

    <div class="card shadow--3dp">
    
    <div class="details">

    <div class="bio card shadow--3dp">

    <div class="profileimage shadow--3dp">
    <img src="images/profile/profile-feature-template-1.jpg" width="100%" height="auto">
    </div>

    <br>
                    Mini Bio content will go here and be related to the information you gave us.

                    This is where I should talk a load of crap but I don't want to.
    </div>

    <div class="articles-by card shadow--3dp">
    
    <h3><?php echo $user['firstname']; ?> has written these awesome articles you should totally check out!</h3>
    
    <?php
    $sql = "SELECT COUNT(id) FROM article WHERE author = :userid";
    $stmt = $conn->prepare($sql);
    //Bind value.
    $stmt->bindValue(':userid', $_GET['userid']);  
    //Execute.
    $stmt->execute();
    $articleno = $stmt->fetchColumn();

    if ($articleno == 0) { ?>
    <p>Oh dear! it looks like <?php echo $user['firstname'] ?> hasn't written any articles yet.<br>
    Maybe you should send an email to try and get them to write atleast 1.</p>
    <?php 
    } else { 

    $sql = "SELECT * FROM article WHERE author = :userid";
    $stmt = $conn->prepare($sql);
    //Bind value.
    $stmt->bindValue(':userid', $_GET['userid']);  
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

<?php include 'includes/overall/footer.php'; ?>