<?php

namespace App\Model;

use SilverStripe\ORM\DataObject;

class FaithPower extends DataObject
{
    private static $table_name = 'FaithPower';

    private static $db = [
        "Sort" => "Int",
        "Name" => "Varchar",
        "Type" => "Varchar",
        "Effect" => "Text",
        "BurnEffect" => "Text",
        "Page" => "Int",
    ];

    private static $has_one = [
        'Source' => Source::class,
    ];
}
