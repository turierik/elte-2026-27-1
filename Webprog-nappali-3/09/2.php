
<?php
    var_dump($_POST);

    $name = trim($_POST["name"] ?? "");
    $age = trim($_POST["age"] ?? "");
    $color = trim($_POST["color"] ?? "");
    $checkbox = trim($_POST["checkbox"] ?? "");
    $date = trim($_POST["date"] ?? "");

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

        $dt = DateTime::createFromFormat('!Y-m-d', $date);
        if ($date === ""){
            $errors["date"] = "Dátum megadása kötelező!";
        } elseif(!$dt || $dt -> format('Y-m-d') !== $date){
            $errors["date"] = "Dátum formátuma helytelen!";
        } else if ($dt >= new DateTime('today')) {
            $errors["date"] = "Dátum a mai nap előtti kell legyen!";
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
    <br><br>
    <form action="2.php" method="POST" novalidate>
        Név: <input type="text" name="name" value="<?= $name ?>">
        <?= $errors["name"] ?? "" ?>
        <br>
        <!-- nem üres, legalább 2 szó -->
        Életkor: <input type="text" name="age" value="<?= $age ?>">
        <?= $errors["age"] ?? "" ?>
        <br>
        <!-- nem üres, egész szám, 0-99 -->
        Egy szín: <select name="color">
            <option value="black" <?= $color === "black" ? "selected" : "" ?> >Fekete</option>
            <option value="red" <?= $color === "red" ? "selected" : "" ?> >Piros</option>
            <option value="blue" <?= $color === "blue" ? "selected" : "" ?> >Kék</option>
            <option value="green" <?= $color === "green" ? "selected" : "" ?> >Zöld</option>
        </select>
        <?= $errors["color"] ?? "" ?>
        <br>
        <!-- a 4 megadott szín közül kell legyen -->
        Checkbox: <input type="checkbox" name="checkbox" <?= $checkbox === "on" ? "checked" : "" ?> >
        <?= $errors["checkbox"] ?? "" ?>
        <br>
        <!-- muszáj bejelölni -->
        Dátum: <input type="date" name="date" value="<?= $date ?>">
        <?= $errors["date"] ?? "" ?>
        <br>
        <!-- formátum: YYYY-mm-dd, a mai nap előtti -->
        <button type="submit">Küldés</button>
        <!-- hibaüzenetek a mező mellett, állapottartó -->
    </form>
</body>
</html>