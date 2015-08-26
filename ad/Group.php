<?php
use application\components\User;
use application\components\User\LDAP\Domain;
use application\components\User\LDAP\Group as GroupLDAP;

/**
 * Created by PhpStorm.
 * User: grishin
 * Date: 16.06.14
 * Time: 16:56
 */


class Group
{
  const GROUP_CREATOR = 'creator';
  const GROUP_ADMIN = 'admin';
  const GROUP_FIN = 'finance';
  const GROUP_1C = 'sys_1c';
  const GROUP_AXAPTA = 'axapta';
  const GROUP_SUPER = 'super';
  const GROUP_MANAGER = 'manager';
  const GROUP_TABLE = 'table';
  public static $LABELS = array(
    self::GROUP_CREATOR => 'Авторы',
    self::GROUP_ADMIN   => 'Системные администраторы',
    self::GROUP_FIN     => 'Финансовый отдел',
    self::GROUP_1C      => 'Программисты 1с',
    self::GROUP_TABLE   => 'Зав. доступом к табелю',
    self::GROUP_AXAPTA  => 'Программисты Axapta',
    self::GROUP_MANAGER => 'Менеджеры',
    self::GROUP_SUPER   => 'Супер пользователи'
  );
  public static $NED_ADMIN = array(
    'saarc',
    'it12'
  );
  private static $CONTACTS = array(
    self::GROUP_ADMIN  => array(
      Domain::KORF  => array(
        'email' => array(
          'Общая' => 'outlook_admin@po-korf.ru'
        ),
        'phone' => array(
          'Апполонов Анатолий' => '(495) 741-33-03 доб. 334',
          'Бутузов Сергей'     => '(495) 741-33-03 доб. 335',
          'Граков Кирилл'      => '(495) 741-33-03 доб. 331'
        )
      ),
      Domain::VENTO => array(
        'email' => array(
          'Саарц Филипп' => 'itned@air-ned.com'
        ),
        'phone' => array(
          'Саарц Филипп' => '(800) 555-84-48 доб.333'
        )
      )
    ),
    self::GROUP_FIN    => array(
      Domain::KORF  => array(
        'email' => array(
          'Кряжина Светлана' => 'krjachina@air-ned.com'
        ),
        'phone' => array(
          'Кряжина Светлана' => '(800) 555-84-48 доб. 310'
        )
      ),
      Domain::VENTO => array(
        'email' => array(
          'Кряжина Светлана' => 'krjachina@air-ned.com'
        ),
        'phone' => array(
          'Кряжина Светлана' => '(800) 555-84-48 доб. 310'
        )
      )
    ),
    self::GROUP_1C     => array(
      Domain::KORF  => array(
        'email' => array(
          'Гагарин Алексей' => 'gagarin@po-korf.ru'
        ),
        'phone' => array()
      ),
      Domain::VENTO => array(
        'email' => array(
          'Гагарин Алексей' => 'gagarin@po-korf.ru'
        ),
        'phone' => array()
      )
    ),
    self::GROUP_AXAPTA => array(
      Domain::KORF  => array(
        'email' => array(
          'Общая' => 'ax@po-korf.ru'
        ),
        'phone' => array(
          'Кручинин Алексей' => '(800) 555-84-48 доб. 309',
          'Наркин Ринат'     => '(800) 555-84-48 доб. 112',
          'Климов Алексей'   => '(800) 555-84-48 доб. 112'
        )
      ),
      Domain::VENTO => array(
        'email' => array(
          'Общая почта' => 'ax@air-ned.com'
        ),
        'phone' => array(
          'Кручинин Алексей' => '(800) 555-84-48 доб. 309',
          'Наркин Ринат'     => '(800) 555-84-48 доб. 112',
          'Климов Алексей'   => '(800) 555-84-48 доб. 112'
        )
      )
    ),
    self::GROUP_TABLE  => array(
      Domain::KORF  => array(
        'email' => array(
          'Симонова Алина' => 'simonova@po-korf.ru'
        ),
        'phone' => array(
          'Симонова Алина' => '(495) 741-33-03 доб. 313'
        )
      ),
      Domain::VENTO => array(
        'email' => array(
          'Симонова Алина' => 'simonova@po-korf.ru'
        ),
        'phone' => array(
          'Симонова Алина' => '(495) 741-33-03 доб. 313'
        )
      )
    ),

    self::GROUP_SUPER  => array(
      Domain::KORF  => array(
        'email' => array(),
        'phone' => array()
      ),
      Domain::VENTO => array(
        'email' => array(),
        'phone' => array()
      )
    ),
  );


  // it1-6 pwd ITit555
  private static $USERS = array(
    self::GROUP_ADMIN  => array(
      'appolonov',
      'girik',
      'grakov',
      'saarc'
      //'sala',
//      'it11',
//      'it12'
    ),
    self::GROUP_FIN    => array(
      'krjachina'
//      'it4'
    ),
    self::GROUP_1C     => array(
      'gagarin'
//      'it2'

    ),
    self::GROUP_AXAPTA => array(
      'narkin',
      'klimov',
      'kruchinin',
      'kudryavceva'
//      'sala',
//      'it5'
    ),
    self::GROUP_SUPER  => array(
      'sala',
      'otdelnov',
      'basov',
      //'it6',
      'sasha'
    ),
    self::GROUP_TABLE  => array(
      'simonova'
//      'it3'
    )
  );

  public static function isCurrentSuper ()
  {
    return self::GROUP_SUPER === self::current();
  }

  public static function current ()
  {
    return UserLDAP::current() ? self::getGroupByUser(UserLDAP::current()) : NULL;
  }

  public static function getGroupByUser (UserLDAP $user)
  {
    foreach (self::$USERS as $group => $users) {
      if (in_array($user->getUserLogin(), $users)) {
        return $group;
      }
    }
    return NULL;
  }

  public static function isCurrentPowerUser ()
  {
    if ((self::GROUP_ADMIN === self::current())
      or (self::GROUP_FIN === self::current())
      or (self::GROUP_1C === self::current())
      or (self::GROUP_AXAPTA === self::current())
      or (self::GROUP_SUPER === self::current())
      or (self::GROUP_TABLE === self::current())
    ) {
      return true;
    } else {
      return false;
    }
  }

  public static function isCurrentAdmin ()
  {
    return self::GROUP_ADMIN === self::current();
  }

  public static function getContacts ($group, $RequestType, $bString = NULL, $type = NULL)
  {
    $domain = in_array($RequestType, GroupLDAP::$VENTO) ? Domain::VENTO : Domain::KORF;
    if ($bString) {
      if ($type) {
        $contacts = self::$CONTACTS[$group][$domain][$type];

        return self::formContactString($contacts, $type);
      } else {
        $result = '';
        foreach (self::$CONTACTS[$group][$domain] as $type => $contacts) {
          $result .= self::formContactString($contacts, $type);
        }

        return $result;
      }
    } else {
      return $type ? self::$CONTACTS[$group][$domain][$type] : self::$CONTACTS[$group][$domain];
    }
  }

  private static function formContactString ($contacts, $type)
  {
    $result = '';
    if (!empty($contacts)) {
      $result = $type == 'email' ? 'Почта:' : 'Телефоны:';
      $result .= '<br>';
      foreach ($contacts as $name => $contact) {
        $result .= '<nobr>' . $name . ' - ' . $contact . '</nobr><br>';
      }
    }
    return $result;
  }
}