<?php
    $name = $_GET["name"] ?? "";
    $pdo = new PDO("sqlite:database.sqlite");
    $stmt = $pdo -> prepare("SELECT * FROM people WHERE name LIKE :name");
    $stmt -> execute(["name" => "%$name%"]);
    $people = $stmt -> fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="index.php" method="GET">
        <input type="text" name="name">
        <button type="submit">Search by name</button>
    </form>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php foreach($people as $p): ?>
            <tr>
                <td><?= $p["id"] ?></td>
                <td><?= $p["name"] ?></td>
                <td><?= $p["age"] ?></td>
                <td><a href="edit.php?id=<?= $p["id"] ?>">Edit</a></td>
                <td><a href="delete.php?id=<?= $p["id"] ?>">Delete</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <a href="new.php">Create new person</a>
</body>
</html>