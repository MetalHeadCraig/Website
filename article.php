<?php
$page = "home";
include 'includes/overall/header.php'; 
?>

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
        echo date('F d, Y. h:m A',strtotime($row['adate']));
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