<?php
    $id = $_GET["id"] ?? -1;
    $pdo = new PDO("sqlite:database.sqlite");
    $stmt = $pdo -> prepare("DELETE FROM people WHERE id = :id");
    $stmt -> execute(["id" => $id]);
    header("location: index.php");
?>