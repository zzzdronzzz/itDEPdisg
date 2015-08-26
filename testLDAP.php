<?php

$user = "ITSite";
$pass = "4515101Tobi451Psymon451";

$userLog = "ivanov";

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
          break;
        }
      }

      ldap_close($ldapconnection);
    }

print_r($LDAPUserInfo[0]);



?>