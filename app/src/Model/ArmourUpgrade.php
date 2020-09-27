<?php

namespace App\Model;

use SilverStripe\ORM\DataObject;

class ArmourUpgrade extends DataObject
{
    private static $table_name = 'ArmourUpgrade';

    private static $db = [
        "Sort" => "Int",
        "Name" => "Varchar",
        "Group" => "Varchar",
        "Type" => "Varchar",
        "Head" => "Int",
        "ArmP" => "Int",
        "ArmS" => "Int",
        "Body" => "Int",
        "LegP" => "Int",
        "LegS" => "Int",
        "Special" => "Varchar",
        "Wt" => "Varchar",
        "Cost" => "Int",
        "Page" => "Int",
    ];

    private static $has_one = [
        'Source' => Source::class,
    ];
}
