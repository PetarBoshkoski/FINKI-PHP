<html>
<head>
    <title>Vezba so formi</title>
    <h3>Vezhba 2.1 / 2.2</h3>
</head>
<body>
<form method="GET" action="collect.php">
    <h3>Registracija</h3>
    Ime: <input type="text" name="ime"> <br />
    Prezime: <input type="text" name="prezime"> <br />
    Email: <input type="text" name="email"> <br />
    Masko: <input type="radio" name="pol" value="1"> <br />
    Zensko: <input type="radio" name="pol" value="0"> <br />
    <input type="submit" name="submit" value="Vnesi">
</form>
</body>

</html>
<?php
if(isset($_GET["submit"])) {
    $ime = $_GET["ime"];
    $prezime = $_GET["prezime"];
    $email = $_GET["email"];

    echo 'Ime:' . $ime;
    echo ' Prezime: ' . $prezime;
    echo ' Email: ' . $email;
}
