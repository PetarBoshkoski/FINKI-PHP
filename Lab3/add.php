<?php
include 'index.php';
?>
<html>
<head>
<title>Add a new!</title>
</head>
<body>
<h1>News Admin Panel</h1>
<form method="post" action="1_manageNews.php">
    <table>
        <tr>
            <td>Naslov na novosta: </td>
            <td><input type="text" name="naslovNovost"></td>
        </tr>
        <tr>
            <td>Celosen tekst na novosta: </td>
            <td><textarea style="width:400px; height: 200px" name="tekstNovost"> </textarea></td>
        </tr>
        <tr>
            <td>
                <input type="submit" name="submit">
            </td>
        </tr>
    </table>
</form>
<?php

?>
</body>
</html>
