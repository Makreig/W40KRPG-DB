<?php

namespace App\Model;

use SilverStripe\ORM\DataObject;

class ShipWeapon extends DataObject
{
    private static $table_name = 'ShipWeapon';

    private static $db = [
        "Sort" => "Int",
        "Name" => "Varchar",
        "Hull" => "Varchar",
        "Group" => "Varchar",
        "Class" => "Varchar",
        "Range" => "Int",
        "tSpeed" => "Int",
        "Strength" => "Varchar",
        "DmgMultiplier" => "Int",
        "DmgDice" => "Int",
        "DmgBonus" => "Int",
        "CritRating" => "Int",
        "Clip" => "Int",
        "ClipSize" => "Int",
        "WpnAttMod" => "Decimal",
        "Rld" => "Boolean",
        "Facing" => "Varchar",
        "Special" => "Varchar",
        "SpecialText" => "Varchar",
        "Power" => "Int",
        "Space" => "Int",
        "SP" => "Int",
        "Availability" => "Varchar",
        "Page" => "Int",
    ];

    private static $has_one = [
        'Source' => Source::class,
    ];
}
