<?php

namespace App\Model;

use SilverStripe\ORM\DataObject;

// 'Trait' is reserved
class CharTrait extends DataObject
{
    private static $table_name = 'Trait';

    private static $db = [
        "Sort" => "Varchar",
        "Name" => "Varchar",
        "Human" => "Boolean",
        "Prerequisite" => "Varchar",
        "Description" => "Text",
        "Group" => "Varchar",
        "parsed" => "Boolean",
        "Embedded" => "Boolean",
        "Page" => "Int",
    ];

    private static $has_one = [
        'Source' => Source::class,
    ];
}
