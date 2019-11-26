<?php
if(isset($_GET["submit"])) {
    $ime = $_GET["ime"];
    $prezime = $_GET["prezime"];
    $email = $_GET["email"];
    $sex = $_GET["pol"];
}
echo 'Ime:' . $ime;
echo ' Prezime: ' . $prezime;
echo ' Email: ' . $email;
if($sex == 1) {
    echo ' Sex: Mashko';
}
else if($sex == 0) {
    echo ' Sex: Zhensko';
}