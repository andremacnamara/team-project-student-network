<?php

$conn = mysqli_connect('localhost', 'root', '', 'StudentNetwork');

if (!$conn) {
    die("Connection failed: ".mysqli_connect_error());
}

?>