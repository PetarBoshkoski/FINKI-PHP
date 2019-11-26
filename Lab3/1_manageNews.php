
<?php
include 'index.php';
function longer_width($string) {
    if(strlen($string) > 100) {
        $newString = substr($string, 0, 100);
        return $newString . "...";
    }
    else {
        return $string;
    }
}


?>
<?php
if(isset($_POST["submit"])) {
    if(isset($_POST["naslovNovost"]) && isset($_POST["tekstNovost"])) {
        $title = $_POST["naslovNovost"];
        $fullText = $_POST["tekstNovost"];
        $sql = "INSERT INTO `news` (`date`, `news_title`, `full_text`) VALUES (CURRENT_DATE , ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$title, $fullText]);
    }
}
?>
<?php
if(isset($_POST["submitComment"])) {
    $id = $_POST["idComment"];
    $comment = $_POST["textareaComment"];
    $author = $_POST["author"];
    $sql = 'INSERT INTO `comments` (`news_id`, `author`, `comment`, approved) VALUES (?, ?, ?, 0)';
    $stmt = $conn -> prepare($sql);

    $stmt -> execute([$id, $author, $comment]);
}
?>
<?php
if(isset($_POST["submitEdit"])) {
    if(isset($_POST["naslovNovost"]) && isset($_POST["tekstNovost"])) {
        $id = $_POST["idNovost"];
        $title = $_POST["naslovNovost"];
        $fullText = $_POST["tekstNovost"];
        $sql = "UPDATE `news` SET `news_title` = ?, `full_text` = ? WHERE `news_id` = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$title, $fullText, $id]);
    }
}

?>
<html>
<head>
    <title>Lab 03 - 163048</title>
</head>
<body>
<h1>Public Panel</h1>
<table border="1px solid black">
    <th>News id</th>
    <th>Date</th>
    <th>News title</th>
    <th>News article</th>
    <th>Comments</th>
    <th>Edit</th>
    <th>Delete</th>
<?php
    if(!empty($_GET["delete"])) {
        $sql = "DELETE FROM `news` WHERE `news_id` = :news_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":news_id", $_GET["delete"]);
        $stmt->execute();
    }
?>
<?php
    $sql = "SELECT * FROM `news` ORDER BY `news_id` DESC LIMIT 5";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
?>
<h3><a href="add.php">Add new News</a>
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
        <td><?=longer_width($row["full_text"]) .  "<br />"?><a href="readMore.php?readmore=<?=$row["news_id"]?>">Read more</a></td>
        <td><a href="add_comment.php?postId=<?=$row["news_id"]?>">New Comment (<?=$numOfComments?>)</a></td>
        <td><a href="edit.php?edit=<?=$row["news_id"]?>">Edit</a></td>
        <td><a href="1_manageNews.php?delete=<?=$row["news_id"]?>">Delete</a></td>
    </tr>
</div>
<?php
}

?>
</table>
<h3><a href="admin.php">Admin Panel</a></h3>
</body>
</html>