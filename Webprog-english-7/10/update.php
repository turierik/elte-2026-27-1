<?php
    $id = $_GET["id"] ?? 0;
    $pdo = new PDO("sqlite:database.sqlite");
    $stmt = $pdo -> prepare("SELECT * FROM people WHERE id = :id");
    $stmt -> execute(["id" => $id]);
    $r = $stmt -> fetch();
    if ($r === null){
        echo "Wrong ID.";
        exit;
    }
    if ($_POST){
        $name = $_POST["name"] ?? "";
        $age  = $_POST["age"] ?? "";
        $errors = [];
        // do your validation
        if (count($errors) === 0){
            $pdo = new PDO("sqlite:database.sqlite");
            $stmt = $pdo -> prepare("UPDATE people SET name = :name, age = :age WHERE id = :id");
            $stmt -> execute(["name" => $name, "age" => $age, "id" => $id]);
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
    <form action="update.php?id="<?= $id ?>" method="POST">
        Name: <input type="text" name="name" value="<?= $r["name"] ?>"><br>
        Age: <input type="number" name="age" value="<?= $r["age"] ?>"><br>
        <button>Save</button>
    </form>
</body>
</html>