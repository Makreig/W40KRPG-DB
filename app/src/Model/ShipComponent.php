<?php

namespace App\Model;

use SilverStripe\ORM\DataObject;

class ShipComponent extends DataObject
{
    private static $table_name = 'ShipComponent';

    private static $db = [
        "Sort" => 'Int',
        "Name" => 'Varchar',
        "Essential" => 'Boolean',
        "Type" => 'Varchar',
        "Prerequisites" => 'Varchar',
        "Benefits" => 'Text',
        "Class" => 'Varchar',
        "SpecialRules" => 'Varchar',
        "Power" => 'Int',
        "Gen" => 'Boolean',
        "SpaceTaken" => 'Int',
        "SPCost" => 'Int',
        "External" => 'Boolean',
        "Availability" => 'Varchar',
        "Page" => 'Int',
    ];

    private static $has_one = [
        'Source' => Source::class,
    ];
}
