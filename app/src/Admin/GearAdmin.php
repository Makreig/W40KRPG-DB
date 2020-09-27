<?php

namespace App\Admin;

use App\Model\Gear;
use ilateral\SilverStripe\ModelAdminPlus\ModelAdminPlus;

class GearAdmin extends ModelAdminPlus
{
    private static $menu_priority = 12;

    private static $managed_models = [
        Gear::class,
    ];

    private static $url_segment = 'gear';

    private static $menu_title = 'Gear';

    private static $menu_icon_class = 'font-icon-cog';
}
