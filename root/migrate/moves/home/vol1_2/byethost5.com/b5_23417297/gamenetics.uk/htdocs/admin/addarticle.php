<?php
$page = "Add article";
include 'includes/cache.php';
include 'includes/header.php';
include 'includes/wysiwyg.php';

//check if user is logged in
if(!isset($_SESSION['user_id']) || !isset($_SESSION['logged_in'])){
    //User not logged in. Redirect them back to the login.php page.
    header('Location: login.php');
    exit;
}

if(isset($_POST['addarticle'])){

    //Retrieve the field values from our articles form.
    $name       = ($_POST['name']);
    $article    = ($_POST['article']);

try {
    $sql = "INSERT INTO article (aname, author, article) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);    
    //Bind value.
    $stmt->bindParam(1, $name);
    $stmt->bindParam(2, $_SESSION['user_id']);
    $stmt->bindParam(3, $article);  
    //Execute.
    $stmt->execute();  
    echo "Article created successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
}
?>

<h3>Add Article</h3>

<form action="addarticle.php" method="post">

<div class="input-container">
    <input type="text" name="name" class="input-field" placeholder="Article Name" >
</div>

<div class="input-container">
    <textarea id="local-upload" name="article" class="input-field" rows="10" cols="30"> </textarea>
</div>
<button class="btn" type="submit" name="addarticle">Add article</button>

</form>

<?php include 'includes/footer.php'; ?>