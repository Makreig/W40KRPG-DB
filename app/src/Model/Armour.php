<?php

namespace App\Model;

use SilverStripe\ORM\DataObject;

class Armour extends DataObject
{
    private static $table_name = 'Armour';

    private static $db = [
        "Sort" => "Int",
        "Name" => 'Varchar',
        'Type' => "Varchar",
        "Ward" => "Varchar",
        "Head" => "Int",
        "ArmP" => "Int",
        "ArmS" => "Int",
        "Body" => "Int",
        "LegP" => "Int",
        "LegS" => "Int",
        "Special" => "Text",
        "Wt" => "Decimal",
        "Cost" => "Decimal",
        "Renown" => "Varchar",
        "Availability" => "Varchar",
        "Pg" => "Int",
        "SourceName" => "Varchar",
        "Primitive" => "Boolean",
    ];
}
