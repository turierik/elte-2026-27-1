<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Ez egy sima <?php
        $x = 5;
        echo $x;
        echo($x);
        print $x;
        print($x);
    ?> címsor</h1>
    <?php
        $t = [6, 8, 0, 1, 7];
        // echo $t; // ilyet ne csinálj
        for($i = 0; $i < count($t); $i++)
            echo $t[$i] . ($i != count($t)-1 ? ", " : "" );
        echo "<br>";
        foreach($t as $x) // python: for x in t
            echo $x; // vesszőket hf megoldani :)
        // tömböt én inkább így iratnék ki:
        echo "<br>";
        echo implode(", ", $t);

        $car = [  // JS objektum ~ PHP asszociatív tömb
            "model"  => "Tesla Model M",
            "year"   => 2023,
            "broken" => false
        ];
        foreach($car as $x) // python: for x in t
            echo $x; // vesszőket hf megoldani :)
        // Tanulság: logikai érték kiiratása "" vagy "1"

        function add(float $a, float $b): float{
            return $a + $b;
        }
        echo "<br>";
        echo add(12.3, 4);

        $two = 2;
        $evens = array_filter($t, function($x) use ($two){
            return $x % $two === 0;
        });
        echo implode("#", $evens);
        $evens = array_filter($t, fn($x) => $x % 2 === 0);
        echo implode("#", $evens);
        function isEven($x){
            return $x % 2 === 0;
        }
        $evens = array_filter($t, "isEven");
        echo implode("#", $evens);
    ?>
</body>
</html>