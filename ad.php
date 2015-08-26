<?php
$srv = "172.17.0.32";
$srv_domain = "korf.int";
$login = "ITsite";
$srv_login = "ITsite@".$srv_domain;
$srv_password = "4515101Tobi451Psymon451";
$dn = "dc=KORF,dc=VENTO";

/*Подскажите как правильно подобрать фильтры?
Вот мои фильтры
$filter = "(&(mail=*)(objectCategory=user)(memberOf=cn=web_mail_catalog,ou=groups,dc=domen,dc=ru))";
$attr = array("sn","mail","initials");
*/

$info = array(
      array(
        'ad_server'    => 'atlantia',
        'ad_domain'    => 'vento.int',
        'ad_subdomain' => 'vento'
      ),
      array(
        'ad_server'    => 'srvvrt06',
        'ad_domain'    => 'korf.int',
        'ad_subdomain' => 'korf'
      )
    );


$dc = ldap_connect($srv);
ldap_set_option($dc, LDAP_OPT_PROTOCOL_VERSION, 3);
ldap_set_option($dc, LDAP_OPT_REFERRALS, 0);

if ($dc) {
   $connAD = ldap_bind($dc,$srv_login,$srv_password);
    if ($connAD) {
     
        $search = @ldap_search($dc, "DC=" . $info['ad_subdomain'] . ", DC=int", "(samaccountname=$srv_login)");

if ($search) {
          $LDAPUserInfo = @ldap_get_entries($dc, $search);
            print_r($LDAPUserInfo[0]['mail'][0]);
          break;
        }

        
        
    }
    else {
     
        echo "fail";
        
    }

}



?>