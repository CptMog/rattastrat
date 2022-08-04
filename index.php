<?php
    require 'bdd.php';
    require 'models/Ranking.php';

    $rankTest = new Ranking();

    foreach($rankTest->getRanks() as $elem){
        echo $elem['name']." ";
    }
    

    require('./views/index.phtml');