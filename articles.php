<?php
$page = "articles";
include 'includes/cache.php';
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

    $sql = "SELECT * FROM users WHERE id = :id";
    $stmt = $conn->prepare($sql);    
    //Bind value.
    $stmt->bindValue(':id', $article['author']);  
    //Execute.
    $stmt->execute();
    $author = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<div class="shadow--3dp card">
    <h4> <?php echo $article['aname']; ?></h4>
    <span style="float: left">Written by <a href="/<?php echo $author['firstname'] . "-" . $author['lastname']; ?>"><?php echo $author['firstname'] . " " . $author['lastname']; ?></a></span>
    <span class=date> <?php echo date('M d, Y',strtotime($article['adate'])); ?> </span><br>
    <hr>
    <?php echo $article['article'] . "<br><br>"; ?>
    </div>
<?php
} else {

if (!isset($_GET["limit"])) {
    $limit = 5;
}
else {
    switch($_GET["limit"]) {
    case "5": $limit = 5; break;
    case "10": $limit = 10; break;
    case "15": $limit = 15; break;
    case "20": $limit = 20; break;
    default: $limit = 5; break;
}}

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
        <center><h1>Articles</h1></center>

    Display 
    <select name="articleNo" id="aLimit" onchange="display()">
    <option value="5" <?php if($limit == 5){echo"selected";} ?>>5</option>
    <option value="10" <?php if($limit == 10){echo"selected";} ?>>10</option>
    <option value="15" <?php if($limit == 15){echo"selected";} ?>>15</option>
    <option value="20" <?php if($limit == 20){echo"selected";} ?>>20</option>
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
        $sql = "SELECT * FROM users WHERE id = :id";
        $stmt = $conn->prepare($sql);    
            //Bind value.
            $stmt->bindValue(':id', $row['author']);  
            //Execute.
            $stmt->execute();
            $author = $stmt->fetch(PDO::FETCH_ASSOC);
            ?>

            <div class="column shadow--3dp card">
            <h4> <?php echo $row['aname']; ?></h4>
            <span style="float: left">Written by <a href="/<?php echo $author['firstname'] . "-" . $author['lastname']; ?>"><?php echo $author['firstname'] . " " . $author['lastname']; ?></a></span>
            <span class=date> <?php echo date('M d, Y',strtotime($row['adate'])); ?> </span><br>
            <hr>
            <?php
            $string = $row['article'];
            $string = preg_replace("/<img[^>]+\>/i", "<i>(There is an image here, you should click Read More to see it.) </i>", $string);
            if (strlen($string) > 600) {
                $trimstring = substr($string, 0, 600). '...<a href="articles.php?article=' . $row['id'] . '">Read More</a>';
            } else {
                $trimstring = $string;
            }
            echo $trimstring;                            
            ?>
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
