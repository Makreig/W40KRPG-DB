<?php

namespace App\Model;

use App\Model\Weapon;
use SilverStripe\ORM\DataObject;

class WeaponQuality extends DataObject
{
    private static $db = [
        'Name' => 'Varchar',
        'Levelled' => 'Boolean',
        'Description' => 'Text',
        'SpecName' => 'Varchar',
        'SpecialText' => 'Text',
        'Embedded' => 'Int',
    ];

    private static $belongs_many_many = [
        'Weapons' => Weapon::class,
    ];
}
