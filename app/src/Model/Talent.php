<?php

namespace App\Model;

use SilverStripe\ORM\DataObject;

class Talent extends DataObject
{
    private static $table_name = 'Talent';

    private static $db = [
        "Sort" => "Int",
        "Name" => "Varchar",
        "Prerequisite" => "Varchar",
        "Benefit" => "Text",
        "Group" => "Varchar",
        "Embedded" => "Varchar",
        "Page" => "Int",
        "Tier" => "Int",
    ];

    private static $has_one = [
        'Source' => Source::class,
    ];
}
