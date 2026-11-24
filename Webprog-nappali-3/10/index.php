<?php
    $filter = $_GET["filter"] ?? "";
    $pdo = new PDO("sqlite:database.sqlite");
    $stmt = $pdo -> prepare("SELECT * FROM people WHERE name LIKE :filter");
    $stmt -> execute(["filter" => "%$filter%"]);
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
        <input type="text" name="filter">
        <button>Search by name</button>
    </form>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
            <th>Update</th>
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
    <a href="add.php">New person</a>
</body>
</html>