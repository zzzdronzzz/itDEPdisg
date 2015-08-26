<?php

//подключаем бд

include 'bd.php';
include 'session.php';

// table users - оснавная информация !! для облегчения запроса вывода общей инфы 

$fam = $_POST['fam'];
$name = $_POST['name_user'];
$otc = $_POST['faName'];
$mobPhone = $_POST['mobPhone'];
$workPhone = $_POST['workPhone'];
$dolg = $_POST['Dolgnost'];
$depart = $_POST['depart'];
$zveno = $_POST['zveno'];
$fil = $_POST['fil'];
$podraz = $_POST['podraz'];

// mustHave - что ему не обходимо работает по составному ключу user_id

    /*
    проверка на стоит ли галочка если да то некоторые параментры надо обрабатывать
    на пример email , axapta и тд
    */

$compCheck = $_POST['compCheck'];
$emailCheck = $_POST['emailCheck'];
$axaptaCheck = $_POST['axaptaCheck'];
$gppCheck = $_POST['gppCheck'];
$buhCheck = $_POST['buhCheck'];
$baseCheck = $_POST['baseCheck'];
$tabCheck = $_POST['tabCheck'];
$garantCheck = $_POST['garantCheck'];

// принемаем оставшиеся поля !

$selectEmail = $_POST['selectMail'];
$rullAxapta = $_POST['rullAxapta'];
$rullGpp = $_POST['rullGPP'];
$rullTab = $_POST['rullTab'];



$coment = $_POST['coment'];


$howWrite = $_POST['howWrite']; // переменая по которой будет происходить запись в базу данных 

//проверка переменой 
if ($howWrite == "1.1") {
 //проверка на пустоту полей
    if ( empty($fam) or empty($name) or empty($otc) or empty($mobPhone) or empty($dolg) or empty($depart) ) {
     
        echo 'заполните все поля';
        
    }
    
    else {
    
        if ($emailCheck != true) {
            
            $selectEmail = "нет";
            
        }
        
        if (($axaptaCheck == true) and (empty($rullAxapta))) {
         
            die("запоните поле axapta");
            
        }
        
        if (($gppCheck == true) and (empty($rullGpp))) {
        
            die("заполните поле ГПП");
            
        }
        
        if (($tabCheck == true) and (empty($rullTab))){
        
            die("заполните поле Табель");
        
        }
        
        if (empty($workPhone)) {
         
            $workPhone = 'не указан';
            
        }
        
        if (empty($zveno)) {
         
            $zveno = 'не указан';
        }
        
        $status = "первичная обработка";
        $date = date("Y-m-d H:i");
        $createUser = $_SESSION['user_name'];
        $type = 'КОРФ, Москва';
        $token = $name . $fam . $otc . $mobPhone . $createUser;
        mysqli_query($conn,"INSERT INTO `users`(`pod`) VALUES ('$token')");
        
       //mysqli_query($conn,"INSERT INTO `users`(`fam`, `name`, `otc`, `phone`, `workPhone`, `dol`, `otdel`, `zveno`, `fil`, `pod`, `create_user`, `status`,`type`, `date`) VALUES ('$fam','$name','$otc','$mobPhone','$workPhone','$dolg','$depart','$zveno','null','null','$createUser','$status','$type','$date')"); 
        
    $id = mysqli_query($conn,"SELECT * FROM `users` WHERE `pod` = '$token'");
        
        $row = mysqli_fetch_array($id);
        
        echo $row[0];
        
       mysqli_query($conn," UPDATE `users` SET `fam`='$fam',`name`='$name',`otc`='$otc',`phone`='$mobPhone',`workPhone`='$workPhone',`dol`='$dolg',`otdel`='$depart',`zveno`='$zveno',`fil`='$fil',`pod`='$podraz',`create_user`= '$createUser',`status`='$status',`type`= '$type',`date`='$date' WHERE `id` = '$row[0]'");
    
        
        mysqli_query($conn,"INSERT INTO `musthave`(`id_user`, `comp`, `mail`, `axapta`, `GPP`, `1c8.2BUH`, `1c8.2Cadrs`, `1c8.2zapln`, `garant`, `comm`) VALUES ('$row[0]','$compCheck','$selectEmail','$rullAxapta','$rullGpp','$buhCheck','$baseCheck','$rullTab','$garantCheck','$coment')");
        
    }
    
}

if ($howWrite == "1.2") {
 //проверка на пустоту полей
    if ( empty($fam) or empty($name) or empty($otc) or empty($mobPhone) or empty($dolg) or empty($depart) or empty($fil)) {
     
        echo 'заполните все поля';
        
    }
    
    else {
    
        if ($emailCheck != true) {
            
            $selectEmail = "нет";
            
        }
        
        if (($axaptaCheck == true) and (empty($rullAxapta))) {
         
            die("запоните поле axapta");
            
        }
        
        if (($gppCheck == true) and (empty($rullGpp))) {
        
            die("заполните поле ГПП");
            
        }
        
        if (($tabCheck == true) and (empty($rullTab))){
        
            die("заполните поле Табель");
        
        }
        
        if (empty($workPhone)) {
         
            $workPhone = 'не указан';
            
        }
        
        if (empty($zveno)) {
         
            $zveno = 'не указан';
        }
        
        $status = "первичная обработка";
        $date = date("Y-m-d H:i");
        $createUser = $_SESSION['user_name'];
        $type = 'КОРФ, Филиалы';
        $type = 'КОРФ, Москва';
        $token = $name . $fam . $otc . $mobPhone . $createUser;
        mysqli_query($conn,"INSERT INTO `users`(`pod`) VALUES ('$token')");
        
       //mysqli_query($conn,"INSERT INTO `users`(`fam`, `name`, `otc`, `phone`, `workPhone`, `dol`, `otdel`, `zveno`, `fil`, `pod`, `create_user`, `status`,`type`, `date`) VALUES ('$fam','$name','$otc','$mobPhone','$workPhone','$dolg','$depart','$zveno','null','null','$createUser','$status','$type','$date')"); 
        
    $id = mysqli_query($conn,"SELECT * FROM `users` WHERE `pod` = '$token'");
        
        $row = mysqli_fetch_array($id);
        
        echo $row[0];
        
       mysqli_query($conn," UPDATE `users` SET `fam`='$fam',`name`='$name',`otc`='$otc',`phone`='$mobPhone',`workPhone`='$workPhone',`dol`='$dolg',`otdel`='$depart',`zveno`='$zveno',`fil`='$fil',`pod`='$podraz',`create_user`= '$createUser',`status`='$status',`type`= '$type',`date`='$date' WHERE `id` = '$row[0]'");
    
        
        mysqli_query($conn,"INSERT INTO `musthave`(`id_user`, `comp`, `mail`, `axapta`, `GPP`, `1c8.2BUH`, `1c8.2Cadrs`, `1c8.2zapln`, `garant`, `comm`) VALUES ('$row[0]','$compCheck','$selectEmail','$rullAxapta','$rullGpp','$buhCheck','$baseCheck','$rullTab','$garantCheck','$coment')");
    
    }
    
}

if ($howWrite == "1.3") {
 //проверка на пустоту полей
    if ( empty($fam) or empty($name) or empty($otc) or empty($mobPhone) or empty($dolg) or empty($depart) ) {
     
        echo 'заполните все поля';
        
    }
    
    else {
    
        if ($emailCheck != true) {
            
            $selectEmail = "нет";
            
        }
        
        if (($axaptaCheck == true) and (empty($rullAxapta))) {
         
            die("запоните поле axapta");
            
        }
        
        if (($gppCheck == true) and (empty($rullGpp))) {
        
            die("заполните поле ГПП");
            
        }
        
        if (($tabCheck == true) and (empty($rullTab))){
        
            die("заполните поле Табель");
        
        }
        
        if (empty($workPhone)) {
         
            $workPhone = 'не указан';
            
        }
        
        
        $status = "первичная обработка";
        $date = date("Y-m-d H:i");
        $createUser = $_SESSION['user_name'];
        $type  = 'НЕД, Держинский';
        $type = 'КОРФ, Москва';
        $token = $name . $fam . $otc . $mobPhone . $createUser;
        mysqli_query($conn,"INSERT INTO `users`(`pod`) VALUES ('$token')");
        
       //mysqli_query($conn,"INSERT INTO `users`(`fam`, `name`, `otc`, `phone`, `workPhone`, `dol`, `otdel`, `zveno`, `fil`, `pod`, `create_user`, `status`,`type`, `date`) VALUES ('$fam','$name','$otc','$mobPhone','$workPhone','$dolg','$depart','$zveno','null','null','$createUser','$status','$type','$date')"); 
        
    $id = mysqli_query($conn,"SELECT * FROM `users` WHERE `pod` = '$token'");
        
        $row = mysqli_fetch_array($id);
        
        echo $row[0];
        
       mysqli_query($conn," UPDATE `users` SET `fam`='$fam',`name`='$name',`otc`='$otc',`phone`='$mobPhone',`workPhone`='$workPhone',`dol`='$dolg',`otdel`='$depart',`zveno`='$zveno',`fil`='$fil',`pod`='$podraz',`create_user`= '$createUser',`status`='$status',`type`= '$type',`date`='$date' WHERE `id` = '$row[0]'");
    
        
        mysqli_query($conn,"INSERT INTO `musthave`(`id_user`, `comp`, `mail`, `axapta`, `GPP`, `1c8.2BUH`, `1c8.2Cadrs`, `1c8.2zapln`, `garant`, `comm`) VALUES ('$row[0]','$compCheck','$selectEmail','$rullAxapta','$rullGpp','$buhCheck','$baseCheck','$rullTab','$garantCheck','$coment')");
    
    }
    
}

if ($howWrite == "1.4") {
 //проверка на пустоту полей
    if ( empty($fam) or empty($name) or empty($otc) or empty($mobPhone) or empty($dolg) or empty($depart) ) {
     
        echo 'заполните все поля';
        
    }
    
    else {
    
        if ($emailCheck != true) {
            
            $selectEmail = "нет";
            
        }
        
        if (($axaptaCheck == true) and (empty($rullAxapta))) {
         
            die("запоните поле axapta");
            
        }
        
        if (($gppCheck == true) and (empty($rullGpp))) {
        
            die("заполните поле ГПП");
            
        }
        
        if (($tabCheck == true) and (empty($rullTab))){
        
            die("заполните поле Табель");
        
        }
        
        if (empty($workPhone)) {
         
            $workPhone = 'не указан';
            
        }
        
        
        $status = "первичная обработка";
        $date = date("Y-m-d H:i");
        $createUser = $_SESSION['user_name'];
        $type  = 'НЕД, Москва';
        $type = 'КОРФ, Москва';
        $token = $name . $fam . $otc . $mobPhone . $createUser;
        mysqli_query($conn,"INSERT INTO `users`(`pod`) VALUES ('$token')");
        
       //mysqli_query($conn,"INSERT INTO `users`(`fam`, `name`, `otc`, `phone`, `workPhone`, `dol`, `otdel`, `zveno`, `fil`, `pod`, `create_user`, `status`,`type`, `date`) VALUES ('$fam','$name','$otc','$mobPhone','$workPhone','$dolg','$depart','$zveno','null','null','$createUser','$status','$type','$date')"); 
        
    $id = mysqli_query($conn,"SELECT * FROM `users` WHERE `pod` = '$token'");
        
        $row = mysqli_fetch_array($id);
        
        echo $row[0];
        
       mysqli_query($conn," UPDATE `users` SET `fam`='$fam',`name`='$name',`otc`='$otc',`phone`='$mobPhone',`workPhone`='$workPhone',`dol`='$dolg',`otdel`='$depart',`zveno`='$zveno',`fil`='$fil',`pod`='$podraz',`create_user`= '$createUser',`status`='$status',`type`= '$type',`date`='$date' WHERE `id` = '$row[0]'");
    
        
        mysqli_query($conn,"INSERT INTO `musthave`(`id_user`, `comp`, `mail`, `axapta`, `GPP`, `1c8.2BUH`, `1c8.2Cadrs`, `1c8.2zapln`, `garant`, `comm`) VALUES ('$row[0]','$compCheck','$selectEmail','$rullAxapta','$rullGpp','$buhCheck','$baseCheck','$rullTab','$garantCheck','$coment')");
    
    }
    
}

if ($howWrite == "1.5") {
 //проверка на пустоту полей
    if ( empty($fam) or empty($name) or empty($otc) or empty($mobPhone) or empty($dolg) or empty($depart) or empty($podraz)) {
     
        echo 'заполните все поля';
        
    }
    
    else {
    
        if ($emailCheck != true) {
            
            $selectEmail = "нет";
            
        }
        
        if (($axaptaCheck == true) and (empty($rullAxapta))) {
         
            die("запоните поле axapta");
            
        }
        
        if (($gppCheck == true) and (empty($rullGpp))) {
        
            die("заполните поле ГПП");
            
        }
        
        if (($tabCheck == true) and (empty($rullTab))){
        
            die("заполните поле Табель");
        
        }
        
        if (empty($workPhone)) {
         
            $workPhone = 'не указан';
            
        }
        
        
        $status = "первичная обработка";
        $date = date("Y-m-d H:i");
        $createUser = $_SESSION['user_name'];
        $type  = 'НЕД, Филиалы';
        $type = 'КОРФ, Москва';
        $token = $name . $fam . $otc . $mobPhone . $createUser;
        mysqli_query($conn,"INSERT INTO `users`(`pod`) VALUES ('$token')");
        
       //mysqli_query($conn,"INSERT INTO `users`(`fam`, `name`, `otc`, `phone`, `workPhone`, `dol`, `otdel`, `zveno`, `fil`, `pod`, `create_user`, `status`,`type`, `date`) VALUES ('$fam','$name','$otc','$mobPhone','$workPhone','$dolg','$depart','$zveno','null','null','$createUser','$status','$type','$date')"); 
        
    $id = mysqli_query($conn,"SELECT * FROM `users` WHERE `pod` = '$token'");
        
        $row = mysqli_fetch_array($id);
        
        echo $row[0];
        
       mysqli_query($conn," UPDATE `users` SET `fam`='$fam',`name`='$name',`otc`='$otc',`phone`='$mobPhone',`workPhone`='$workPhone',`dol`='$dolg',`otdel`='$depart',`zveno`='$zveno',`fil`='$fil',`pod`='$podraz',`create_user`= '$createUser',`status`='$status',`type`= '$type',`date`='$date' WHERE `id` = '$row[0]'");
    
        
        mysqli_query($conn,"INSERT INTO `musthave`(`id_user`, `comp`, `mail`, `axapta`, `GPP`, `1c8.2BUH`, `1c8.2Cadrs`, `1c8.2zapln`, `garant`, `comm`) VALUES ('$row[0]','$compCheck','$selectEmail','$rullAxapta','$rullGpp','$buhCheck','$baseCheck','$rullTab','$garantCheck','$coment')");
    
    }
    
}

?>