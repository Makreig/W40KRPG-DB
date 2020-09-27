<?php
namespace App\Model;

use SilverStripe\ORM\DataObject;

class Place extends DataObject
{
    private static $table_name = 'Place';

    private static $db = [
        "Sort" => "Int",
        "Planet" => "Varchar",
        "Type" => "Varchar",
        "System" => "Varchar",
        "Subsector" => "Varchar",
        "Sector" => "Varchar",
        "Description" => "Text",
        "Page" => "Int",
    ];

    private static $has_one = [
        'Source' => Source::class,
    ];
}
