
<?php
    var_dump($_POST);

    $name = trim($_POST["name"] ?? "");
    $age = trim($_POST["age"] ?? "");
    $color = trim($_POST["color"] ?? "");
    $checkbox = trim($_POST["checkbox"] ?? "");

    $errors = [];

    $allowedColors = ["black", "red", "blue", "green"];

    if ($_POST) {
    if ($name === "") {
        $errors["name"] = "A név megadása kötelező!";
    } elseif (str_word_count($name) < 2) {
        $errors["name"] = "Legalább két szót kell megadni!";
    }

    if ($age === "") {
        $errors["age"] = "Az életkor megadása kötelező!";
    } elseif (filter_var($age, FILTER_VALIDATE_INT) === false) {
        $errors["age"] = "Az életkor csak egész szám lehet!";
    } elseif ($age < 0 || $age > 99) {
        $errors["age"] = "Az életkor 0 és 99 között lehet!";
    }

    if (!in_array($color, $allowedColors, true))
        $errors["color"] = "Érvénytelen szín!";

    if ($checkbox != "on") {
        $errors["checkbox"] = "A jelölőmező bejelölése kötelező!";
    }

    if (count($errors) === 0) {
        // Jövő héten elmentjük adatbázisba :)
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
    <form action="2.php" method="POST" novalidate>
        Név: <input type="text" name="name" value="<?= $name ?>">
        <?= $errors["name"] ?? "" ?>
        <br>
        <!-- nem üres, legalább 2 szó -->
        Életkor: <input type="text" name="age" value="<?= $age ?>">
        <?= $errors["age"] ?? "" ?>
        <br>
        <!-- nem üres, egész szám, 0-99 -->
        Szín: <select name="color">
            <option value="black" <?= $color === "black" ? "selected" : "" ?> >Fekete</option>
            <option value="red" <?= $color === "red" ? "selected" : "" ?> >Piros</option>
            <option value="blue" <?= $color === "blue" ? "selected" : "" ?> >Kék</option>
            <option value="green" <?= $color === "green" ? "selected" : "" ?> >Zöld</option>
        </select>
        <?= $errors["color"] ?? "" ?>
        <br>
        <!-- csak ez a 4 érték egyike lehet -->
        Jelölőmező: <input type="checkbox" name="checkbox" <?= $checkbox === "on" ? "checked" : "" ?> >
        <?= $errors["checkbox"] ?? "" ?>
        <br>
        <!-- muszáj bejelölni -->
        <button type="submit">Mentés</button>
        <!-- validáció, hibaüzenetek a mező mellett, állapottartás -->
    </form>
</body>
</html>