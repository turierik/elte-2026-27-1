<?php
    require_once("../vendor/autoload.php");
    
    use Cowsayphp\Farm;

    $cow = Farm::create(\Cowsayphp\Farm\Dragon::class);
    echo $cow->say("Ohmg I'm a cow!");

    $faker = Faker\Factory::create("hu_HU");
    for ($i = 0; $i < 10; $i++)
        echo $faker -> name() . "\n";