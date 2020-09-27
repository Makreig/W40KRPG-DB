<?php

namespace App\Model;

use SilverStripe\ORM\DataObject;

class Gear extends DataObject
{
    private static $table_name = 'Gear';

    private static $db = [
        "Sort" => "Varchar",
        "Name" => "Varchar",
        "Type" => "Varchar",
        "Description" => "Text",
        "Weight" => "Decimal",
        "Cost" => "Varchar",
        "Renown" => "Varchar",
        "Availability" => "Varchar",
        "Page" => "Varchar",
        "Cost" => "Int",
    ];

    private static $has_one = [
        'Source' => Source::class,
    ];
}
