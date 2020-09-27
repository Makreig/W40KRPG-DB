<?php

namespace App\Admin;

use App\Model\Armour;
use App\Model\ArmourUpgrade;
use ilateral\SilverStripe\ModelAdminPlus\ModelAdminPlus;

class ArmourAdmin extends ModelAdminPlus
{
    private static $menu_priority = 12;

    private static $managed_models = [
        Armour::class,
        ArmourUpgrade::class,
    ];

    private static $url_segment = 'armour';

    private static $menu_title = 'Armour';

    private static $menu_icon_class = 'font-icon-p-shield';
}
