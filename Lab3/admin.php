<?php
include 'index.php';

$sql = 'SELECT * from `comments` WHERE `approved` = 0';
$stmt = $conn -> prepare($sql);
$stmt -> execute();
?>
<h1>Admin Panel</h1>
<h3>Not approved comments</h3>
<table border="1px solid black">
    <tr>
        <th>News Id</th>
        <th>Comment</th>
        <th>Approve</th>
    </tr>
<?php while($row = $stmt->fetch()) {
?>
    <body>
        <form>
                <tr>
                    <td><?=$row["news_id"]?></td>
                    <td><?=$row["comment"]?></td>
                    <td><a href="add_comment.php?postId=<?=$row["news_id"]?>">Approve?</a></td>
                </tr>

        </form>
    </body>
<?php } ?>
</table>
<h3>All news</h3>
<table border="1px solid black">
    <th>News id</th>
    <th>Date</th>
    <th>News title</th>
    <th>News article</th>
    <th>Comments</th>
    <th>Edit</th>
    <th>Delete</th>
    <?php
    $sql = "SELECT * FROM `news`";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    ?>
     <?php
        while($row = $stmt->fetch()) {
            $numOfComments = 0;
            $sql_ = 'SELECT * FROM `comments` WHERE `news_id` = :newsId AND `approved` = 1';
            $stmt_ = $conn->prepare($sql_);
            $stmt_ -> bindParam(":newsId", $row["news_id"]);
            $stmt_->execute();
            $row_ = $stmt_->rowCount();
            $numOfComments = $row_;
            ?>
            <div>
                <tr>
                    <td><?=$row["news_id"]?></td>
                    <td><?=$row["date"]?></td>
                    <td><?=$row["news_title"]?></td>
                    <td><?=$row["full_text"]?></td>
                    <td><a href="add_comment.php?postId=<?=$row["news_id"]?>">New Comment (<?=$numOfComments?>)</a></td>
                    <td><a href="edit.php?edit=<?=$row["news_id"]?>">Edit</a></td>
                    <td><a href="1_manageNews.php?delete=<?=$row["news_id"]?>">Delete</a></td>
                </tr>
            </div>
            <?php
        }

        ?>
</table>
<h3><a href="1_manageNews.php">Public Panel</a></h3>
