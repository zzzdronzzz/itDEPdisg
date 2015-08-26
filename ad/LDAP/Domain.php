<?php
/**
 * Created by PhpStorm.
 * User: grishin
 * Date: 16.06.14
 * Time: 11:09
 */

namespace application\components\User\LDAP;


class Domain
{
    const KORF  = 'korf.int';
    const VENTO = 'vento.int';

    public static $LABELED = array(
        self::KORF  => 'KORF',
        self::VENTO => 'VENTO'
    );
} 