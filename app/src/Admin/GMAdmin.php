<?php

namespace App\Admin;

use App\Model\NPC;
use App\Model\Place;
use ilateral\SilverStripe\ModelAdminPlus\ModelAdminPlus;

class GMAdmin extends ModelAdminPlus
{
    private static $menu_priority = 12;

    private static $managed_models = [
        NPC::class,
        Place::class,
    ];

    private static $url_segment = 'gm';

    private static $menu_title = 'GM';

    private static $menu_icon_class = 'font-icon-attention';
}
