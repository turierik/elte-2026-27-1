<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Ez egy szép <?php
        $x = 5;
        echo $x;
        echo($x);
        print $x;
        print($x);
    ?> címsor</h1>

    <?php
        $t = [8, 2, 9];
        for ($i = 0; $i < count($t); $i++){
            echo $t[$i] . ", ";
        }
        foreach($t as $x){ // python: for x in t
            echo $x . ", "; // persze most a végén is vessző van, deal with it :)
        }
        echo "<br>";
        // tömb kiiratás - nagyon tanuld meg :)
        // echo $t; --- ilyet ne!
        echo implode(", ", $t); // js: join --> implode, split --> explode

        $car = [  // JS objektum --> PHP "asszociatív tömb"
            "model"  => "Trabant",
            "year"   => 1976,
            "broken" => false
        ];
        foreach($car as $key => $value){
            //echo $key . " is equal " . $value . "<br>"; // stringként: false --> "", true --> "1"
            echo "{$key} is equal $value<br>"; // ez a dupla idézőjeles string!
            echo '$key is equal $value<br>'; // ez (') nem helyettesíti be!
        }

        function isEven(int $n): bool{ // típusok nem kötelezők, de lehetnek
            return $n % 2 === 0;
        }

        // filter v1
        $filtered = array_filter($t, "isEven");
        var_dump($filtered);

        // filter v2
        $two = 2;
        $filtered = array_filter($t, function($n) use ($two){
            return $n % $two === 0;
        });
        var_dump($filtered);

        // filter v3
        $filtered = array_filter($t, fn($n) => $n % $two === 0);
        var_dump($filtered);
    ?>
</body>
</html>