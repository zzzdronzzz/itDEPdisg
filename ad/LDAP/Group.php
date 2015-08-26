<?php
/**
 * Created by PhpStorm.
 * User: grishin
 * Date: 16.06.14
 * Time: 16:59
 */

namespace application\components\User\LDAP;


class Group
{
    //VENTO

    const VENTO_KORF_MSK = 'CN=it_reg_КОРФМСК,OU=Группы для портала,OU=Группы доступа,OU=Группы,DC=vento,DC=int';
    const VENTO_KORF_FIL = 'CN=it_reg_КОРФФИЛИАЛЫ,OU=Группы для портала,OU=Группы доступа,OU=Группы,DC=vento,DC=int';
    const VENTO_NED_MSK  = 'CN=it_reg_НЕДМСК,OU=Группы для портала,OU=Группы доступа,OU=Группы,DC=vento,DC=int';
    const VENTO_NED_FIL  = 'CN=it_reg_НЕДФИЛИАЛЫ,OU=Группы для портала,OU=Группы доступа,OU=Группы,DC=vento,DC=int';
    const VENTO_NED_DZE  = 'CN=it_reg_НЕДДЗЕРЖИНСКИЙ,OU=Группы для портала,OU=Группы доступа,OU=Группы,DC=vento,DC=int';


    //KORF

    const KORF_KORF_MSK = 'CN=it_reg_КОРФМСК,OU=Группы для портала,OU=Технические группы,OU=Группы и списки рассылки,DC=korf,DC=int';
    const KORF_KORF_FIL = 'CN=it_reg_КОРФФИЛИАЛЫ,OU=Группы для портала,OU=Технические группы,OU=Группы и списки рассылки,DC=korf,DC=int';
    const KORF_NED_MSK  = 'CN=it_reg_НЕДМСК,OU=Группы для портала,OU=Технические группы,OU=Группы и списки рассылки,DC=korf,DC=int';
    const KORF_NED_FIL  = 'CN=it_reg_НЕДФИЛИАЛЫ,OU=Группы для портала,OU=Технические группы,OU=Группы и списки рассылки,DC=korf,DC=int';
    const KORF_NED_DZE  = 'CN=it_reg_НЕДДЗЕРЖИНСКИЙ,OU=Группы для портала,OU=Технические группы,OU=Группы и списки рассылки,DC=korf,DC=int';


    const KORF_DEFAULT  = self::KORF_KORF_MSK;
    const VENTO_DEFAULT = self::VENTO_NED_MSK;

    public static $ALL_KORF = array(
        self::KORF_KORF_MSK,
        self::KORF_KORF_FIL,
        self::VENTO_KORF_MSK,
        self::VENTO_KORF_FIL
    );

    public static $ALL_NED = array(
        self::KORF_NED_MSK,
        self::KORF_NED_FIL,
        self::KORF_NED_DZE,
        self::VENTO_NED_MSK,
        self::VENTO_NED_FIL,
        self::VENTO_NED_DZE
    );

    public static $LABELS = array(
        self::KORF_KORF_MSK  => 'КОРФ, Москва',
        self::KORF_KORF_FIL  => 'КОРФ, Филиалы',
        self::KORF_NED_MSK   => 'НЕД, Москва',
        self::KORF_NED_FIL   => 'НЕД, Филиалы',
        self::KORF_NED_DZE   => 'НЕД, Дзержинский',
        self::VENTO_KORF_MSK => 'КОРФ, Москва',
        self::VENTO_KORF_FIL => 'КОРФ, Филиалы',
        self::VENTO_NED_MSK  => 'НЕД, Москва',
        self::VENTO_NED_FIL  => 'НЕД, Филиалы',
        self::VENTO_NED_DZE  => 'НЕД, Дзержинский'
    );

    public static $ALL = array(
        self::KORF_KORF_MSK,
        self::KORF_KORF_FIL,
        self::KORF_NED_MSK,
        self::KORF_NED_FIL,
        self::KORF_NED_DZE,
        self::VENTO_KORF_MSK,
        self::VENTO_KORF_FIL,
        self::VENTO_NED_MSK,
        self::VENTO_NED_FIL,
        self::VENTO_NED_DZE
    );

    public static $KORF = array(
        self::KORF_KORF_MSK,
        self::KORF_KORF_FIL,
        self::KORF_NED_MSK,
        self::KORF_NED_FIL,
        self::KORF_NED_DZE,
    );

    public static $VENTO = array(
        self::VENTO_KORF_MSK,
        self::VENTO_KORF_FIL,
        self::VENTO_NED_MSK,
        self::VENTO_NED_FIL,
        self::VENTO_NED_DZE

    );

    public static $FILIAL = array(
        self::KORF_KORF_FIL,
        self::KORF_NED_FIL,
        self::VENTO_KORF_FIL,
        self::VENTO_NED_FIL

    );

    public static $MOSCOW = array(
        self::KORF_KORF_MSK,
        self::KORF_NED_MSK,
        self::VENTO_KORF_MSK,
        self::VENTO_NED_MSK
    );

    public static $DZE = array(
        self::KORF_NED_DZE,
        self::VENTO_NED_DZE
    );

    public static function currentLabeled()
    {
        $groups = array();
        foreach (\UserLDAP::current()->getUserGroups() as $group) {
            if (isset(self::$LABELS[$group])) {
                $groups[$group] = self::$LABELS[$group];
            }
        }

        return $groups;
    }

    public static $FIELD_TO_GROUP = array(
        'pc_access'  => array(
            self::KORF_KORF_MSK,
            self::KORF_NED_DZE,
            self::KORF_NED_MSK,
            self::VENTO_NED_MSK,
            self::VENTO_NED_DZE,
            self::VENTO_KORF_MSK
        ),
        'sys_1c_fin' => array(
            self::KORF_KORF_MSK,
            self::KORF_NED_DZE,
            self::VENTO_NED_MSK,
            self::VENTO_NED_DZE,
            self::KORF_NED_MSK,
            self::VENTO_KORF_MSK
        ),
        'sys_1c_hr' => array(
            self::KORF_KORF_MSK,
            self::KORF_NED_DZE,
            self::VENTO_NED_MSK,
            self::VENTO_NED_DZE,
            self::KORF_NED_MSK,
            self::VENTO_KORF_MSK
        ),
        'garant' => array(
            self::KORF_KORF_MSK,
            self::KORF_NED_DZE,
            self::VENTO_NED_MSK,
            self::VENTO_NED_DZE,
            self::KORF_NED_MSK,
            self::VENTO_KORF_MSK
        )
    );

} 