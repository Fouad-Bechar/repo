<?php 
    require_once __DIR__.'/../config/config.php';

   if( isset($_GET['token']) &&  isset($_GET['u']) && !empty($_GET['u']) && !empty($_GET['token'])) {
    $u = htmlspecialchars(base64_decode($_GET['u']));
    $token = htmlspecialchars(base64_decode($_GET['token']));   
    $check = $bdd->prepare('SELECT * FROM password_recover WHERE token_user = ? AND token = ?');
    $check->execute(array($u, $token));
    $row = $check->rowCount();
    $data = $check->fetch();  
    if($row){
        $get = $bdd->prepare('SELECT token FROM utilisateurs WHERE token = ?');
        $get->execute(array($u));
        $data_u = $get->fetch();
        if(hash_equals($data_u['token'], $u)){
            header('Location: password_change.php?u='.base64_encode($u));
            die();
        }else{
           echo  "<center>"."<h1 style='color:red; margin-top: 100px'>"."Error: invalid token"."</h1>"."</center>";
        }
    }else{
        echo "<center>"."<h1 style='color:red; margin-top: 100px'>"."Error: account does not exist"."</h1>"."</center>";
    }
}else {
      echo "<center>"."<h1 style='color:red; margin-top: 100px'>"."Invalid link"."</h1>"."</center>";
}
