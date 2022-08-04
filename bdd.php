<?php


$conn = new PDO(
  "mysql:host=localhost;dbname=rattastrat"
  ,"djawad"
  ,"djawad1996"
  ,[
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
  ]
)
?>