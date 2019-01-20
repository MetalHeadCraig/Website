<?php
$page = "articles";
include 'includes/overall/header.php'; 
?>
<link rel="stylesheet" href="css/articles.css" />
        <center><h1>Articles</h1></center>
        
    <div class = "row">

<?php

try {
    $data = $conn->query("SELECT * FROM article")->fetchAll();

    foreach ($data as $row) {
        echo "<div class=\"column shadow--3dp card\">";
        echo "<h4>".$row['aname']."</h4>";
        echo "<span style=\"float: left;\">Written by Admin</span>";
        echo "<span class=\"date\">";
        echo date('M d, Y',strtotime($row['adate']));
        echo "</span><br />";
        echo "<hr>";
        echo $row['article']."<br><br>";
        echo "<span style=\"float: right;\"><a href=\"#\">Read More</a></span>";
        echo "</div>";
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