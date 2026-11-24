<?php
    $id = $_GET["id"] ?? -1;
    $pdo = new PDO("sqlite:database.sqlite");
    $stmt = $pdo -> prepare("SELECT * FROM people WHERE id = :id");
    $stmt -> execute(["id" => $id]);
    $p = $stmt -> fetch();
    if ($p === false){
        echo "Nincs ilyen ID!";
        exit();
    }
    if ($_POST){
        $name = $_POST["name"] ?? "";
        $age  = $_POST["age"] ?? "";
        $errors = [];
        // validálj
        if (count($errors) === 0){
            // mehet a módosítás
            $stmt = $pdo -> prepare("UPDATE people SET name = :name, age = :age WHERE id = :id");
            $stmt -> execute(["name" => $name, "age" => $age, "id" => $id]);
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
    <form action="edit.php?id=<?= $id ?>" method="POST">
        Name: <input type="text" required name="name" value="<?= $p["name"] ?>"><br>
        Age:  <input type="number" required name="age" value="<?= $p["age"] ?>"><br>
        <button>Save</button>
    </form>
</body>
</html>