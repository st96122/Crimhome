<?php
header("Location:GG.php");
include("ur.php");


$pdo -> query("DELETE FROM Gomoku WHERE '1'");
$pdo -> query("DELETE FROM guser WHERE '1'");

?>