<?php

namespace App\Admin;

use App\Model\CharTrait;
use App\Model\Skill;
use App\Model\Talent;
use ilateral\SilverStripe\ModelAdminPlus\ModelAdminPlus;

class CharacterAdmin extends ModelAdminPlus
{
    private static $menu_priority = 12;

    private static $managed_models = [
        Skill::class,
        Talent::class,
        CharTrait::class,
    ];

    private static $url_segment = 'character';

    private static $menu_title = 'Character';

    private static $menu_icon_class = 'font-icon-torsos-all';
}
