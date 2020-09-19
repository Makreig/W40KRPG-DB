<?php

namespace App\Model;

use App\Model\WeaponQuality;
use SilverStripe\ORM\DataObject;

class Weapon extends DataObject
{
    private static $table_name = 'Unit';

    private static $db = [
        'Name' => 'Varchar',
        'Category' => 'Enum("Grenade, Melee, Melee/Thrown, Ranged, Thrown","Ranged")',
        'Group' => 'Varchar',
        'Class' => 'Enum("Basic, Heavy, Melee, Mounted, Natural, Pistol, Thrown","Basic")',
        'Range' => 'Varchar',
        'Single' => 'Boolean',
        'Semi' => 'Int',
        'Full' => 'Int',
        'DmgDiceNo' => 'Int',
        'DmgDiceType' => 'Int',
        'DmgMod' => 'Decimal',
        'Type' => 'Varchar',
        'Pen' => 'Int',
        'Clip' => 'Int',
        'ClipSize' => 'Int',
        'WpnAttMod' => 'Decimal',
        'Rld' => 'Varchar',
        'NumHands' => 'Int',
        'SpecialText' => 'HTMLText',
        'Wt' => 'Decimal',
        'Cost' => 'Decimal',
        'Renown' => 'Enum("Distinguised, Famed, Hero, Renown, Respected","")',
        'Availability' => 'Enum("Ubiquitous, Abundant, Plentiful, Common, Average, Scarce, Rare, Very Rare, Extremely Rare, Near Unique, Unique", "Common")',
        'ShopSort' => 'Int',
        'Source' => 'Varchar',
        'Page' => 'Int',
    ];

    private static $many_many = [
        'Qualities' => WeaponQuality::class,
    ];

    private static $many_many_extraFields = [
        'Qualities' => [
            'Level' => 'Int',
        ],
    ];

    private static $summary_fields = [

    ];

    private static $export_fields = [

    ];

    private static $indexes = [
        'KeyName' => ['Name', 'Source'],
    ];

}
