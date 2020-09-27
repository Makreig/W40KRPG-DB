<?php

namespace App\Admin;

use App\Model\Crit;
use App\Model\Source;
use ilateral\SilverStripe\ModelAdminPlus\ModelAdminPlus;

class CoreAdmin extends ModelAdminPlus
{
    private static $renownLevels = [
        "Distinguised",
        "Famed",
        "Hero",
        "Renown",
        "Respected",
    ];

    private static $availabilityLevels = [
        "Ubiquitous",
        "Abundant",
        "Plentiful",
        "Common",
        "Average",
        "Scarce",
        "Rare",
        "Very Rare",
        "Extremely Rare",
        "Near Unique",
        "Unique",
    ];

    private static $menu_priority = 8;

    private static $managed_models = [
        Source::class,
        Crit::class,
    ];

    private static $url_segment = 'core';

    private static $menu_title = 'Core';

    private static $menu_icon_class = 'font-icon-book';
}
