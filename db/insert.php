<?php
include 'connect.php';

try {
        $sql = "use game";
        $conn->exec($sql);
        $sql = "INSERT INTO article (aname, author, article)
        VALUES (
            'Article 1', 
            '0', /* this will be the user id */
            'Some text information regarding an Article that was put up by one of us. Now would you kindly read this again a further 3 more times before reaching the empty social network feed boxes.'
            )";
        $conn->exec($sql);
        $sql = "INSERT INTO article (aname, author, article)
        VALUES (
            'Article 2', 
            '0', /* this will be the user id */ 
            'Some text information regarding an Article that was put up by one of us. Now would you kindly read this again a further 2 more times before reaching the empty social network feed boxes.'
            )";
        $conn->exec($sql);
        $sql = "INSERT INTO article (aname, author, article)
        VALUES (
            'Article 3', 
            '0', /* this will be the user id */ 
            'Some text information regarding an Article that was put up by one of us. Now would you kindly read this again a further 1 more time before reaching the empty social network feed boxes.'
            )";
        $conn->exec($sql);
        $sql = "INSERT INTO article (aname, author, article)
        VALUES (
            'Article 4', 
            '0', /* this will be the user id */ 
            'Some text information regarding an Article that was put up by one of us.'
            )";
        $conn->exec($sql);
        echo "Articles inserted successfully";
    }
catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}

?>