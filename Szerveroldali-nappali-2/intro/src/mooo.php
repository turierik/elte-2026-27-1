<?php
    require __DIR__ . '/../vendor/autoload.php';
    use Cowsayphp\Farm;
    $cow = Farm::create(\Cowsayphp\Farm\Dragon::class);
    echo $cow -> say("Ohmg I'm a cow!");
?>