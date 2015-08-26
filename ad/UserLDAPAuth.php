<?php

/**
 * Created by PhpStorm.
 * User: butik
 * Date: 15.02.14
 * Time: 14:00
 */
use application\components\User\LDAP\Group;
use application\components\User\LDAP\Domain;

class UserLDAPAuth
{
  const SYSTEM = 'system|system';

  private $_UserLogin = NULL;
  private $_UserPassword = NULL;

  private $_IsError = FALSE;
  private $_Errors = array();

  //UserParams
  private $_UserPost;
  private $_UserFamily;
  private $_UserMiddleName;
  private $_UserName;
  private $_UserPhone;
  private $_UserEmail;
  private $_UserDepartment;
  private $_UserDomain;
  private $_UserCompany;
  private $_UserMailServer;
  private $_UserGroups;

  private static $CACHED_USERS = array();


  private function ParseUserInfo($LDAPUserInfo = NULL)
  {
    $this->_UserName       = $LDAPUserInfo[0]['givenname'][0];
    $this->_UserMiddleName = $LDAPUserInfo[0]['middlename'][0];
    $this->_UserFamily     = $LDAPUserInfo[0]['sn'][0];
    $this->_UserPost       = $LDAPUserInfo[0]['title'][0];
    $this->_UserPhone      = $LDAPUserInfo[0]['telephonenumber'][0];
    $this->_UserEmail      = $LDAPUserInfo[0]['mail'][0];

    preg_match("/CN=(.*),OU=(.*),OU=(.*),OU=(.*),DC=(.*),DC=(.*)$/", $LDAPUserInfo[0]['dn'], $dn);
    $this->_UserDepartment = $dn[2];
    $this->_UserCompany    = $dn[3];
    $this->_UserDomain     = $dn[5] . '.' . $dn[6];

    preg_match_all("/[CN|DC]=([a-z A-Z\d\(\)]+)/", $LDAPUserInfo[0]['homemdb'][0], $homemdb);
    $this->_UserMailServer = $homemdb[1][3] . '.' . $homemdb[1][11] . '.' . $homemdb[1][12];

    $this->_UserGroups = $LDAPUserInfo[0]['memberof'];
    unset($this->_UserGroups['count']);
  }

  private function AddError($text)
  {
    if (!$this->_IsError) $this->_IsError = TRUE;
    $this->_Errors[] = $text;
  }

  public function getIsError()
  {
    return $this->_IsError;
  }

  public function getErrors($isArray = TRUE, $Separator = '<br>')
  {
    $Result = NULL;
    if ($this->_IsError) {
      if ($isArray) {
        $Result = $this->_Errors;
      } else {
        $Result = join($this->_Errors, $Separator);
      }
    }

    return $Result;
  }

  private function GetUserInfo()
  {
    $LDAPServers = array(
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

    $LDAPUserInfo = NULL;
    foreach ($LDAPServers as $ServerParams) {
      $ldapconnection = ldap_connect($ServerParams['ad_server'] . '.' . $ServerParams['ad_domain']);
      ldap_set_option($ldapconnection, LDAP_OPT_PROTOCOL_VERSION, 3);
      ldap_set_option($ldapconnection, LDAP_OPT_REFERRALS, 0);
      $options["base_dn"] = "DC=" . $ServerParams['ad_subdomain'] . ", DC=int";
      $BindLDAP           = @ldap_bind($ldapconnection, $this->_UserLogin . "@" . $ServerParams['ad_domain'], $this->_UserPassword);

      if ($BindLDAP) {
        $search = @ldap_search($ldapconnection, "DC=" . $ServerParams['ad_subdomain'] . ", DC=int", "(samaccountname=$this->_UserLogin)");
        if ($search) {
          $LDAPUserInfo = @ldap_get_entries($ldapconnection, $search);
          break;
        }
      }

      ldap_close($ldapconnection);
    }

    if (!is_null($LDAPUserInfo)) {
      $this->ParseUserInfo($LDAPUserInfo);
    } else {
      $this->AddError('Неверно указан логин или пароль');
    }
  }

  public function __construct($UserLogin = NULL, $UserPassword = NULL)
  {

    if (is_null($UserLogin) || is_null($UserPassword)) {
      $this->AddError('Неверно задан логин или пароль');
    } else {
      $this->_UserLogin    = $UserLogin;
      $this->_UserPassword = $UserPassword;
      $this->GetUserInfo();
    }

    self::$CACHED_USERS[$this->getId()] = $this;

  }

  /**
   * Должность
   * @return string
   */
  public function getUserPost()
  {
    return $this->_UserPost;
  }

  /**
   * Сервер где лежит почта пользователя
   * @return string
   */
  public function getUserMailServer()
  {
    return $this->_UserMailServer;
  }

  /**
   * Компания
   * @return string
   */
  public function getUserCompany()
  {
    return $this->_UserCompany;
  }

  /**
   * Отдел
   * @return string
   */
  public function getUserDepartment()
  {
    return $this->_UserDepartment;
  }

  /**
   * Домен
   * @return string
   */
  public function getUserDomain()
  {
    return $this->_UserDomain;
  }

  /**
   * Email
   * @return string
   */
  public function getUserEmail()
  {
    return $this->_UserEmail;
  }

  /**
   * Фамилия
   * @return string
   */
  public function getUserFamily()
  {
    return $this->_UserFamily;
  }

  /**
   * @return null
   */
  public function getUserLogin()
  {
    return $this->_UserLogin;
  }

  /**
   * @return mixed
   */
  public function getUserMiddleName()
  {
    return $this->_UserMiddleName;
  }

  public function getUserFio()
  {
//        return trim($this->getUserFamily() . ' ' . $this->getUserName() . ' ' . $this->getUserMiddleName());
    return trim($this->getUserFamily() . ' ' . $this->getUserName() );
  }

  /**
   * Имя сотрудника
   * @return string
   */
  public function getUserName()
  {
    return $this->_UserName;
  }

  /**
   * @return null
   */
  public function getUserPassword()
  {
    return $this->_UserPassword;
  }

  /**
   * @return mixed
   */
  public function getUserPhone()
  {
    return $this->_UserPhone;
  }

  public function getId()
  {
    return $this->getUserLogin() . '|' . $this->getUserPassword();
  }

  public function getUserGroups()
  {
    $default = Group::KORF_DEFAULT;
    $allowedGroups = Group::$KORF;
    if (Domain::VENTO == $this->getUserDomain()){
      $default = Group::VENTO_DEFAULT;
      $allowedGroups = Group::$VENTO;
    }
    $userGroups = $this->_UserGroups ? $this->_UserGroups : array($default);
    $userGroups = array_intersect( $userGroups, $allowedGroups);
    return $userGroups;
  }

  public function isMemberOfGroups($groups = NULL)
  {
    return is_array($groups)
      ? array_intersect($groups, $this->getUserGroups())
      : in_array($groups, $this->getUserGroups());
  }

  /**
   * @return null|UserLDAP
   */
  public static function current()
  {
    return isset(Yii::app()->user->LDAP) ? self::get(Yii::app()->user->LDAP) : NULL;
  }

  /**
   * @param string $userId
   * @return null|UserLDAP
   */
  public static function get($userId)
  {

    if (empty(self::$CACHED_USERS[$userId])) {
      $credentials = explode('|', $userId);
      new self($credentials[0], $credentials[1]);
    }

    return self::$CACHED_USERS[$userId];
  }
}

?>