<?php
include 'index.php';
if(!empty($_GET["readmore"])) {
    $id = $_GET["readmore"];
    $sql = ('SELECT * FROM `news` where `news_id` = ?');
    $stmt = $conn -> prepare($sql);
    $stmt -> execute([$id]);
    $row = $stmt->fetch();
}
?>
<!DOCTYPE html>
<table border="1px solid black">
    <th>News id</th>
    <th>Date</th>
    <th>News title</th>
    <th>News article</th>
    <th>Comment</th>
    <th>Edit</th>
    <th>Delete</th>
<?php
    ?>
    <div>
        <tr>
            <td><?=$row["news_id"]?></td>
            <td><?=$row["date"]?></td>
            <td><?=$row["news_title"]?></td>
            <td><?=$row["full_text"]?></td>
            <td><a href="comments.php">New Comment ()</a></td>
            <td><a href="edit.php?edit=<?=$row["news_id"]?>">Edit</a></td>
            <td><a href="1_manageNews.php?delete=<?=$row["news_id"]?>">Delete</a></td>
        </tr>
    </div>
    <?php

?>
</table>
<h1>Add a new comment</h1>
<form action="1_manageNews.php" method="post">
    <table>
        <tr>
            <td><input type="text" readonly name="idComment" value="<?=$row["news_id"]?>">New Id</td>
        </tr>
        <tr>
            <td><input type="text" name="author">Author</td>
        </tr>
        <tr>
            <td><textarea style="width:400px; height: 200px" name="textareaComment" placeholder="Enter comment text here..."></textarea></td>
        </tr>
        <tr>
            <td><input type="submit" name="submitComment"></td>
        </tr>
    </table>
</form>

</html>

