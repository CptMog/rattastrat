<?php

class Topic{

    function __construct(){

    }

    function registerNewTopic($title){
        global $conn;
        $requete = $conn->prepare("INSERT INTO Topic(title) VALUES (?)");
        $requete->execute([$title]);
    }

    function getTopics(){
        global $conn;
        $requete = $conn->query("SELECT * FROM Topic");
        $results = $requete->fetchAll();
        return $requete;
    }

}