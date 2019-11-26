<?php
include 'index.php';
if(!empty($_GET["postId"])) {
    $Id = $_GET["postId"];
    $sql = 'UPDATE `comments` SET `approved` = 1 WHERE `news_id` = ?';
    $stmt = $conn -> prepare($sql);
    $stmt -> execute([$Id]);
}
?>
<?php
if(!empty($_GET["postId"])) {
    $Id = $_GET["postId"];
    $sql = 'SELECT * FROM `comments` where `news_id` = ? AND `approved` = 1';
    $stmt = $conn->prepare($sql);
    $stmt->execute([$Id]);

    while ($row = $stmt->fetch()) {
        ?>
        <?='Comment: '?><s><?=$row["comment"] . '<br />'?></s>
    <?php }
}
?>
