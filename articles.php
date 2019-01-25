<?php
$page = "articles";
include 'includes/overall/header.php'; 
//$limit = 5;

switch($_GET["limit"]){
    case "1": $limit = 1; break;
    case "2": $limit = 2; break;
    case "4": $limit = 4; break;
    case "5": $limit = 5; break;
    default: $limit = 5; break;
}
?>
<link rel="stylesheet" href="css/articles.css" />
        <center><h1>Articles</h1></center>

       Which one is better for number of artices to display? <br><br>
    Display <a href="?limit=1"">1</a> <a href="?limit=2"">2</a> <a href="?limit=4"">4</a> <a href="?limit=5"">5</a> articles per page.<br>
    <br>(non-functioning at the moment)<br>
    Display 
    <select name="articleNo">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="4">4</option>
    <option value="5" selected>5</option>
    </select>
    articles per page.

    <div class = "row">

<?php

try {
    $data = $conn->query("SELECT * FROM article ORDER BY id DESC LIMIT $limit")->fetchAll();

    foreach ($data as $row) {
        $sql = "SELECT firstname, lastname FROM users WHERE id = :id";
        $stmt = $conn->prepare($sql);    
            //Bind value.
            $stmt->bindValue(':id', $row['author']);  
            //Execute.
            $stmt->execute();
            $author = $stmt->fetch(PDO::FETCH_ASSOC);
            ?>

            <div class="column shadow--3dp card">
            <h4> <?php echo $row['aname']; ?></h4>
            <span style="float: left">Written by <a href="#"><?php echo $author['firstname'] . " " . $author['lastname']; ?></a></span>
            <span class=date> <?php echo date('M d, Y',strtotime($row['adate'])); ?> </span><br>
            <hr>
            <?php echo $row['article'] . "<br><br>"; ?>
            <span style="float: right"><a href="#">Read More</a></span>
            </div>
<?php
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
?>
</div>
<br>
<?php include 'includes/overall/footer.php'; ?>