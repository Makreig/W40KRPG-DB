<?php

namespace App\Model;

use SilverStripe\ORM\DataObject;

class Crit extends DataObject
{
    private static $table_name = 'Crit';

    private static $db = [
        "Sort" => 'Int',
        "Location" => 'Enum("Head, Body, Arms, Legs", "Body")',
        "Roll" => 'Int',
        'DamType' => 'Varchar',
        'Result' => 'Text',
        'Page' => 'Int',
    ];

    private static $has_one = [
        'Source' => Source::class,
    ];
}
