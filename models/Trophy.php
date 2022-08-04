<?php

class Trophy{

    function __construct(){

    }

    function registerNewTrophy($name){
        global $conn;
        $requete = $conn->prepare("INSERT INTO Trophy(name) VALUES (?)");
        $requete->execute([$name]);
    }

    function getTrophys(){
        global $conn;
        $requete = $conn->query("SELECT * FROM Trophy");
        $results = $requete->fetchAll();
        return $requete;
    }

}