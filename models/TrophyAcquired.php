<?php

class TrophyAcquired{

    function __construct(){

    }

    function registerNewTrophyAcquired($aquicitionObject){
        global $conn;
        $requete = $conn->prepare("INSERT INTO TrophyAcquired(name) VALUES (?, ?,".date("d m y | h m s").")");
        $requete->execute([$aquicitionObject['user'],$aquicitionObject['trophy']]);
    }

    function getTrophyAcquiredUser($idUser){
        global $conn;
        $requete = $conn->prepare("SELECT * FROM TrophyAcquired WHERE idUser = ?");
        $requete->execute([$idUser]);
        $results = $requete->fetchAll();
        return $results;
    }

    function getTrophyAcquired(){
        global $conn;
        $requete = $conn->query("SELECT * FROM TrophyAcquired");
        $results = $requete->fetchAll();
        return $requete;
    }

}