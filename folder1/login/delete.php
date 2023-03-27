<?php 
    session_start();
    require_once 'config.php';
    if(!isset($_SESSION['user'])){
        header('Location:index.php');
        die();
    }
    $req = $bdd->prepare('DELETE FROM utilisateurs WHERE token = ?');
    $req->execute(array($_SESSION['user'])); 
   header('Location: https://fouad.rf.gd/');
   exit;
?>