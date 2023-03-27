<?php    
    session_start();
    require_once '../config.php';
    if(!isset($_SESSION['user']))
    {
        header('Location:../index.php');
        die();
    }
if(isset($_POST['save'])) {
$fileName = $_FILES['file']["name"];
$fileType = $_FILES['file']["type"];
$fileData = file_get_contents($_FILES['file']["tmp_name"]);
$file = ($_FILES['file']["tmp_name"]);
move_uploaded_file($file,"files/".$fileName);
$position = "files/".$fileName;             
$update = $bdd->prepare('UPDATE utilisateurs SET file = :file, fileName = :fileName, fileType = :fileType, position = :position  WHERE token = :token');
$update->execute(array(
"file" => $file,
"fileName" => $fileName,
"fileType" => $fileType,
"position" => $position,
"token" => $_SESSION['user']
));
header('Location: ../landing.php?err=success_avatar');
die();
}
else{
header('Location: ../landing.php');
die();
    }
