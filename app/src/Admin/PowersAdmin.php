<?php

namespace App\Admin;

use App\Model\FaithPower;
use App\Model\Power;
use ilateral\SilverStripe\ModelAdminPlus\ModelAdminPlus;

class PowersAdmin extends ModelAdminPlus
{
    private static $menu_priority = 12;

    private static $managed_models = [
        Power::class,
        FaithPower::class,
    ];

    private static $url_segment = 'powers';

    private static $menu_title = 'Powers';

    private static $menu_icon_class = 'font-icon-eye';
}
