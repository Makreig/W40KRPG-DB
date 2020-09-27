<?php

namespace App\Admin;

use App\Model\Weapon;
use App\Model\WeaponQuality;
use App\Model\WeaponUpgrade;
use ilateral\SilverStripe\ModelAdminPlus\ModelAdminPlus;

class WeaponsAdmin extends ModelAdminPlus
{
    private static $menu_priority = 10;

    private static $managed_models = [
        Weapon::class,
        WeaponQuality::class,
        WeaponUpgrade::class,
    ];

    private static $url_segment = 'weapons';

    private static $menu_title = 'Weapons';

    private static $menu_icon_class = 'font-icon-rocket';
}
