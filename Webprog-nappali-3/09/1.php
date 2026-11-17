<?php
    $x = $_GET["x"] ?? "";
    $errors = [];

    if ($_GET){
        if ($x === ""){
            $errors["x"] = "x-et ki kell tölteni.";
        } elseif(filter_var($x, FILTER_VALIDATE_FLOAT) === false){
            $errors["x"] = "x legyen szám!";
        }

        if (count($errors) === 0){
            // feldolgozás, ha egyik mezőben se volt hiba
            $y = $x * $x;
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
    <form action="1.php" method="GET" novalidate>
        <!-- GET:  1.php?x=5 -->
        <!-- POST: 1.php + adatok valahol a kérés törzsében, nem látom -->
        x = <input type="text" name="x" value="<?= $x ?>">
        <?= $errors["x"] ?? "" ?>
        <br>
        x négyzete: <?= $y ?? "Nincs." ?>
        <button type="submit">Küldés</button>
    </form>
</body>
</html>