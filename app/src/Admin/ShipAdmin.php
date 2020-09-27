<?php

namespace App\Admin;

use App\Model\ShipComponent;
use App\Model\ShipWeapon;
use ilateral\SilverStripe\ModelAdminPlus\ModelAdminPlus;

class ShipAdmin extends ModelAdminPlus
{
    private static $menu_priority = 12;

    private static $managed_models = [
        ShipWeapon::class,
        ShipComponent::class,
    ];

    private static $url_segment = 'ship';

    private static $menu_title = 'Ship';

    private static $menu_icon_class = 'font-icon-rocket';
}
