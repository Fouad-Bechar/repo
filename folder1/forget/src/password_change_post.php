<?php 
require_once __DIR__.'/../config/config.php';
if(!empty($_POST['password']) && !empty($_POST['password_repeat']) && !empty($_POST['token'])){
            $password = htmlspecialchars($_POST['password']);
            $password_repeat = htmlspecialchars($_POST['password_repeat']);
            $token = htmlspecialchars($_POST['token']);
            $check = $bdd->prepare('SELECT * FROM utilisateurs WHERE token = ?');
            $check->execute(array($token));
            $row = $check->rowCount();

            if($row){
                if($password === $password_repeat){
                    $cost = ['cost' => 12];
                    $password = password_hash($password, PASSWORD_BCRYPT, $cost);

                    $update = $bdd->prepare('UPDATE utilisateurs SET password = ? WHERE token = ?');
                    $update->execute(array($password, $token));
                    
                    $delete = $bdd->prepare('DELETE FROM password_recover WHERE token_user = ?');
                    $delete->execute(array($token));
                    echo  "<center>"."<h1 style='color:green; margin-top: 100px'>"."The password has been changed successfully"."</h1>"."</center>";
                   header('Refresh: 3; URL=https://fouad.rf.gd/login/index.php');
                    exit;
                }else{
                    echo  "<center>"."<h1 style='color:red; margin-top: 100px'>"."Passwords are not the same"."</h1>"."</center>";
                    header("Refresh: 3;"."URL=". $_SERVER['HTTP_REFERER']);
                    exit;
                }
            }else{ 
                 echo  "<center>"."<h1 style='color:red; margin-top: 100px'>"."Account does not exist"."</h1>"."</center>";
                  header("Refresh: 3;"."URL=". $_SERVER['HTTP_REFERER']);
                  exit;
            }
        }else{
              echo  "<center>"."<h1 style='color:red; margin-top: 100px'>"."Please enter a password"."</h1>"."</center>";
               header("Refresh: 3;"."URL=". $_SERVER['HTTP_REFERER']);
             exit;
        }
