<?php
define ('DB_HOST', 'localhost');
define ('DB_USER', 'user');
define ('DB_PASS', 'sskky1234');
define ('DB_NAME', 'vuokraamo');

//otetaan yhteys tietokantaan
$link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

//tarkistetaan onnistuiko yhteys

if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}