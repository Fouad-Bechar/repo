<?php    
    session_start();
    require_once '../config.php';
    if(!isset($_SESSION['user']))
    {
        header('Location:../index.php');
        die();
    }
    if (!empty($_POST['new_name']) && !empty($_POST['new_email']) && !empty($_POST['current_password'])) {
        $new_name = htmlspecialchars($_POST['new_name']);
        $new_email = htmlspecialchars($_POST['new_email']);
        $current_password = htmlspecialchars($_POST['current_password']);
        $check  = $bdd->prepare('SELECT password, email, full_name FROM utilisateurs WHERE token = :token');
        $check->execute(array(
            "token" => $_SESSION['user']
        ));
        $data = $check->fetch();
        if(password_verify($current_password, $data['password']))
        {
             if($new_name != $data['full_name']) {
             if($new_email != $data['email']) {
                $update = $bdd->prepare('UPDATE utilisateurs SET  full_name = :full_name, email = :email WHERE token = :token');
                $update->execute(array(
                    "full_name" => $new_name,
                    "email" => $new_email,
                    "token" => $_SESSION['user']
                ));
                header('Location: ../landing.php?err=success_profile');
                die();
             }
            else {     
            header('Location: ../landing.php?err=email_used');
            die();
             } 
               }
            else {     
            header('Location: ../landing.php?err=name_used');
            die();
                 }
        
        }
        else {
         header('Location: ../landing.php?err=current_password');
           die();
        }
    }

  else if (!empty($_POST['new_name']) && !empty($_POST['current_password'])) {
        $new_name = htmlspecialchars($_POST['new_name']);
        $current_password = htmlspecialchars($_POST['current_password']);
        $check  = $bdd->prepare('SELECT password, full_name FROM utilisateurs WHERE token = :token');
        $check->execute(array(
            "token" => $_SESSION['user']
        ));
        $data = $check->fetch();
        if(password_verify($current_password, $data['password']))
                {
                if($new_name != $data['full_name']) {
                $update = $bdd->prepare('UPDATE utilisateurs SET  full_name = :full_name WHERE token = :token');
                $update->execute(array(
                    "full_name" => $new_name,
                    "token" => $_SESSION['user']
                ));
                header('Location: ../landing.php?err=success_profile');
                die();
                }
            else {     
            header('Location: ../landing.php?err=name_used');
            die();
                 } }
        else {
         header('Location: ../landing.php?err=current_password');
           die(); }
    } 
  else if (!empty($_POST['new_email']) && !empty($_POST['current_password'])) {
        $new_email = htmlspecialchars($_POST['new_email']);
        $current_password = htmlspecialchars($_POST['current_password']);
        $check  = $bdd->prepare('SELECT password, email FROM utilisateurs WHERE token = :token');
        $check->execute(array(
            "token" => $_SESSION['user']
        ));
        $data = $check->fetch();
        if(password_verify($current_password, $data['password']))
                {
                if($new_email != $data['email']) {
                $update = $bdd->prepare('UPDATE utilisateurs SET email = :email WHERE token = :token');
                $update->execute(array(
                    "email" => $new_email,
                    "token" => $_SESSION['user']
                ));
                header('Location: ../landing.php?err=success_profile');
                die();
                }
            else {     
            header('Location: ../landing.php?err=email_used');
            die();
                 } 
                 }
        else {
         header('Location: ../landing.php?err=current_password');
           die(); }
    } 
     else if (empty($_POST['email']) && empty($_POST['full_name']) && !empty($_POST['current_password']) ) { 
        header('Location: ../landing.php?err=empty_square');
        die();
     }
    else{
        header('Location: ../landing.php');
        die();
    }
