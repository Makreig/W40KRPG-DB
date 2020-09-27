<?php

namespace App\Model;

use SilverStripe\ORM\DataObject;

class Power extends DataObject
{
    private static $table_name = 'Power';

    private static $db = [
        "Sort" => "Int",
        "Name" => "Varchar",
        "Type" => "Varchar",
        "Discipline" => "Varchar",
        "Threshold" => "Int",
        "FocusTime" => "Varchar",
        "SubType" => "Varchar",
        "Sustained" => "Boolean",
        "Range" => "Varchar",
        "Effect" => "Text",
        "ObIncrement" => "Int",
        "ObEffect" => "Text",
        "Special" => "Text",
        "FocusTest" => "Varchar",
        "Opposed" => "Varchar",
        "FocusMod" => "Decimal",
        "Cost" => "Int",
        "page" => "Int",
    ];

    private static $has_one = [
        'Source' => Source::class,
    ];
}
