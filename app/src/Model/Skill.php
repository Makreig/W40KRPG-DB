<?php

namespace App\Model;

use SilverStripe\ORM\DataObject;

class Skill extends DataObject
{
    private static $table_name = 'Skill';

    private static $db = [
        "Sort" => "Int",
        "Name" => "Varchar",
        "Basic" => "Boolean",
        "Descriptor" => "Varchar",
        "Char" => "Varchar",
        "Description" => "Varchar",
        "Groups" => "Varchar",
        "Time" => "Varchar",
        "Page" => "Int",
    ];

    private static $has_one = [
        'Source' => Source::class,
    ];

    private static $summary_fields = [
        "Sort",
        "Name",
        "Basic",
        "Descriptor",
        "Char",
        "Description",
        "Groups",
        "Time",
    ];

}
