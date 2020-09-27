<?php

namespace App\Model;

use SilverStripe\ORM\DataObject;

class NPC extends DataObject
{
    private static $table_name = 'NPC';

    private static $db = [
        "Sort" => "Int",
        "Name" => "Varchar",
        "Type" => "Varchar",
        "TypeII" => "Varchar",
        "Affiliation" => "Varchar",
        "Setting" => "Varchar",
        "Page" => "Int",
        "Description" => "Text",
    ];

    private static $has_one = [
        'Source' => Source::class,
    ];
}
