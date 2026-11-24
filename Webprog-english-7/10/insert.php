<?php
    $name = $_POST["name"] ?? "";
    $age  = $_POST["age"] ?? "";
    $errors = [];
    if ($_POST){
        // do your validations like last week
        if (count($errors) === 0){
            $pdo = new PDO("sqlite:database.sqlite");
            $stmt = $pdo -> prepare("INSERT INTO people (name, age) VALUES (:name, :age)");
            $stmt -> execute(["name" => $name, "age" => $age]);
            header("location: index.php");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="insert.php" method="POST">
        Name: <input type="text" required name="name"><br>
        Age: <input type="number" required name="age"><br>
        <button>Save</button>
    </form>
</body>
</html>