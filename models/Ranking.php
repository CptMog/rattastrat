<?php

class Ranking{

    function __construct(){

    }

    function registerNewRanking($name){
        global $conn;
        $requete = $conn->prepare("INSERT INTO Ranking(name) VALUES (?)");
        $requete->execute([$name]);
    }

    function getRanks(){
        global $conn;
        $requete = $conn->query("SELECT * FROM Ranking");
        $results = $requete->fetchAll();
        return $requete;
    }

}