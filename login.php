<?php

include 'functions/bd.php';
include 'functions/session.php';

@$name = mysqli_real_escape_string($conn,$_POST['username']);
@$password = $_POST['password'];



$salt = substr(sha1($name), 10, 20)."\3\1\2\6";

$option = [
'salt' => $salt
];


$passHash = password_hash($password,PASSWORD_DEFAULT,$option);


$check = mysqli_query($conn,"
    SELECT * FROM `administrators` 
    WHERE `nickname` = '$name'
");
 

$row = mysqli_fetch_array($check, MYSQLI_NUM);


if ($row[1] == $name) {
    
    if (password_verify($password,$passHash)) {
    $_SESSION['user_id'] = $row[1];
    $_SESSION['user_name'] = $row[3];
        header('Location: index.php');
exit;
        
        
    }

}
else {
 
    exit();
    
}


?>