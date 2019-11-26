<?php
include 'index.php';
if(!empty($_GET["edit"])) {
    $id = $_GET["edit"];
    $sql = ('SELECT * FROM `news` where `news_id` = ?');
    $stmt = $conn -> prepare($sql);
    $stmt -> execute([$id]);
}
?>
<?php
while($row = $stmt -> fetch()) {
?>

<form method="post" action="1_manageNews.php">
    <table>
        <tr>
            <td>Id na novosta: </td>
            <td><input type="text" name="idNovost" readonly value="<?=$row["news_id"] ?>"></td>
        </tr>
        <tr>
            <td>Datum na novosta: </td>
            <td><input type="text" name="datumNovost" readonly value="<?=$row["date"]?>"></td>
        </tr>
        <tr>
            <td>Naslov na novosta: </td>
            <td><input type="text" name="naslovNovost" value="<?=$row["news_title"]?>"></td>
        </tr>
        <tr>
            <td>Celosen tekst na novosta: </td>
            <td><textarea style="width:400px; height: 200px" name="tekstNovost"><?php echo $row["full_text"] ?></textarea></td>
        </tr>
        <tr>
            <td>
                <input type="submit" name="submitEdit">
            </td>
        </tr>
    </table>
</form>
<?php } ?>