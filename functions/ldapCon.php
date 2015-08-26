<?php

include 'session.php';
include 'bd.php';

$user = $_POST["username"];
$password = $_POST["password"];

if (!empty($user) and !empty($password)) {
    


function loginAD($user,$password) {
 
    $LDAPServers = array(
      array(
        'ad_server'    => 'atlantia',
        'ad_domain'    => 'vento.int',
        'ad_subdomain' => 'vento'
      ),
      array(
        'ad_server'    => 'galactus',
        'ad_domain'    => 'korf.int',
        'ad_subdomain' => 'korf'
      )
    );

    $LDAPUserInfo = NULL;
    foreach ($LDAPServers as $ServerParams) {
      $ldapconnection = ldap_connect($ServerParams['ad_server'] . '.' . $ServerParams['ad_domain']);
      ldap_set_option($ldapconnection, LDAP_OPT_PROTOCOL_VERSION, 3);
      ldap_set_option($ldapconnection, LDAP_OPT_REFERRALS, 0);
      $options["base_dn"] = "DC=" . $ServerParams['ad_subdomain'] . ", DC=int";
      $BindLDAP           = @ldap_bind($ldapconnection, $user . "@" . $ServerParams['ad_domain'], $password);

      if ($BindLDAP) {
        ldap_close($ldapconnection);
        return 1 ;
      }

      
    }
    
}
    if (loginAD($user,$password) == 1) {
        
        rulles($user);
     
        $_SESSION["user_id"] = $user;
        
    }
    else { 
$name = mysqli_real_escape_string($conn,$_POST['username']);
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
    $_SESSION['userRull'] = $row[4];
        header('Location: ../index.php');
exit;
        
    }

}
else {
 
    exit();
    
}
    }
}
else {
    echo "заполните все поля!";
}

function rulles($userLogin) {
 
    $user = "ITSite";
$pass = "4515101Tobi451Psymon451";

$userLog = $user;

$LDAPServers = array(
      array(
        'ad_server'    => 'atlantia',
        'ad_domain'    => 'vento.int',
        'ad_subdomain' => 'vento'
      ),
      array(
        'ad_server'    => 'galactus',
        'ad_domain'    => 'korf.int',
        'ad_subdomain' => 'korf'
      )
    );

    $LDAPUserInfo = NULL;
    foreach ($LDAPServers as $ServerParams) {
      $ldapconnection = ldap_connect($ServerParams['ad_server'] . '.' . $ServerParams['ad_domain']);
      ldap_set_option($ldapconnection, LDAP_OPT_PROTOCOL_VERSION, 3);
      ldap_set_option($ldapconnection, LDAP_OPT_REFERRALS, 0);
      $options["base_dn"] = "DC=" . $ServerParams['ad_subdomain'] . ", DC=int";
      $BindLDAP           = @ldap_bind($ldapconnection, $user . "@" . $ServerParams['ad_domain'], $pass);

      if ($BindLDAP) {
        $search = ldap_search($ldapconnection, "DC=" . $ServerParams['ad_subdomain'] . ", DC=int", "(samaccountname=$userLog)",array("memberof"));
        if ($search) {
          $LDAPUserInfo = ldap_get_entries($ldapconnection, $search);
            checkGroup($LDAPUserInfo[0]["memberof"]);
          break;
        }
      }

      ldap_close($ldapconnection);
    }

  return $LDAPUserInfo;  
    
}

function checkGroup($adGroups) {
    
 $groups = array(
    "1.1" => "CN=it_reg_КОРФМСК,OU=Группы для портала,OU=Технические группы,OU=Группы и списки рассылки,DC=korf,DC=int",
     "1.2" => "CN=it_reg_КОРФФИЛИАЛЫ,OU=Группы для портала,OU=Технические группы,OU=Группы и списки рассылки,DC=korf,DC=int",
     "1.3" => "CN=it_reg_НЕДДЗЕРЖИНСКИЙ,OU=Группы для портала,OU=Технические группы,OU=Группы и списки рассылки,DC=korf,DC=int",
     "1.4" => "CN=it_reg_НЕДМСК,OU=Группы для портала,OU=Технические группы,OU=Группы и списки рассылки,DC=korf,DC=int",
     "1.5" => "CN=it_reg_НЕДФИЛИАЛЫ,OU=Группы для портала,OU=Технические группы,OU=Группы и списки рассылки,DC=korf,DC=int"
 );  
    $userRull = array(); 
    
    foreach ($adGroups as $value) {
        
        foreach ($groups as $key => $inc) {
           // echo $value . "<br>";
            if ($inc == $value) {
                array_push($userRull,$key);
            }
        }
    }
    
    $_SESSION['userRull'] = $userRull;
    $_SESSION['user_name'] = $user;
    header('Location: ../index.php');
}


?>