<?php
$page = "articles";
include 'includes/overall/header.php'; 

if (isset($_GET["article"])) {
    $id = $_GET['article'];
    $sql = "SELECT * FROM article WHERE id = :id";
    $stmt = $conn->prepare($sql);
    //Bind value.
    $stmt->bindValue(':id', $_GET['article']);  
    //Execute.
    $stmt->execute();
    $article = $stmt->fetch(PDO::FETCH_ASSOC);

    $sql = "SELECT firstname, lastname FROM users WHERE id = :id";
    $stmt = $conn->prepare($sql);    
    //Bind value.
    $stmt->bindValue(':id', $article['author']);  
    //Execute.
    $stmt->execute();
    $author = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<div class="column shadow--3dp card">
    <h4> <?php echo $article['aname']; ?></h4>
    <span style="float: left">Written by <a href="#"><?php echo $author['firstname'] . " " . $author['lastname']; ?></a></span>
    <span class=date> <?php echo date('M d, Y',strtotime($article['adate'])); ?> </span><br>
    <hr>
    <?php echo $article['article'] . "<br><br>"; ?>
<?php
} else {

    if (!isset($_GET["limit"])) {
        $limit = 5;
    }
    else {
        switch($_GET["limit"]) {
        case "1": $limit = 1; break;
        case "2": $limit = 2; break;
        case "4": $limit = 4; break;
        case "5": $limit = 5; break;
        default: $limit = 5; break;
        }
    }

    if (!isset($_GET["page"])) {
        $current = 1;
    } else {
        $current = $_GET["page"];
    }

    $pageno = 1;
    $offset = $limit * ($current - 1);
    $tarticles = $conn->query("SELECT count(1) FROM article")->fetchColumn();
    $pages = ceil($tarticles / $limit);

?>
<link rel="stylesheet" href="css/articles.css" />
<center><h1>Articles</h1></center>

    Display 
        <select name="articleNo" id="aLimit" onchange="display()">
        <option value="1" <?php if($limit == 1){echo"selected";} ?>>1</option>
        <option value="2" <?php if($limit == 2){echo"selected";} ?>>2</option>
        <option value="4" <?php if($limit == 4){echo"selected";} ?>>4</option>
        <option value="5" <?php if($limit == 5){echo"selected";} ?>>5</option>
        </select>
    articles per page.


    <div class="pagination">
        <u><a href="?page=1&limit=<?php echo $limit; ?>">First</a></u> 
        <u><a href="#"><<</a></u>

        <?php
        while($pageno <= $pages){
        ?>
        <u><a href="?page=<?php echo $pageno; ?>&limit=<?php echo $limit; ?>"<?php if ($current == $pageno){ ?> class="active" <?php ;} ?>>
        <?php echo $pageno; ?></a></u> <?php
        $pageno++;
        } 
        ?>

        <u><a href="#">>></a></u> 
        <u><a href="?limit=<?php echo $limit; ?>&?page=<?php echo $pages; ?>">Last</a></u> 
    </div>    

    <div class = "row">

        <?php

        try {
        $data = $conn->query("SELECT * FROM article ORDER BY id DESC LIMIT $limit OFFSET $offset")->fetchAll();

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

    <div class="pagination">
        <u><a href="?page=1&limit=<?php echo $limit; ?>">First</a></u> 
        <u><a href="#"><<</a></u>

        <?php
        while($pageno <= $pages){
        ?>
        <u><a href="?page=<?php echo $pageno; ?>&limit=<?php echo $limit; ?>"<?php if ($current == $pageno){ ?> class="active" <?php ;} ?>>
        <?php echo $pageno; ?></a></u> <?php
        $pageno++;
        } 
        ?>

        <u><a href="#">>></a></u> 
        <u><a href="?limit=<?php echo $limit; ?>&?page=<?php echo $pages; ?>">Last</a></u> 
    </div>

    <br>
<?php 
}
include 'includes/overall/footer.php'; ?>

<script>
function display() {
var x = document.getElementById("aLimit").value;
window.location = "?limit=" + x;
}
</script>
