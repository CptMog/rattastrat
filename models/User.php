<?php

class User{

    function __construct(){
        
    }

    registerUser($objetUser){
        global $conn;
        $requete =  $conn->prepare(`INSERT INTO User(idRank,userName,firstname,lastname,email,mdp,level,xp)".
        ."VALUES (1,?,?,?,?,?,1,0);`);
        $requete->execute([$objetUser['userName'],[$objetUser['firstName'],[$objetUser['lastName'],[$objetUser['email'],[$objetUser['mdp']]);

    }

    getUserById($id){
        global $conn;
        $requete = $conn->prepare("SELECT * FROM user WHERE idUser = ?");
        $requete->execute([$id]);
        $result = $requete->fetch();
        return $result;
    }

    getAllUser(){
        global $conn;
        $requete = $conn->prepare("SELECT * FROM user");
        $requete->execute([]);
        $result = $requete->fetchAll();
        return $result;
    }


}