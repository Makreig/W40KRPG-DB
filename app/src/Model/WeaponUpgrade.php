<?php

namespace App\Model;

use SilverStripe\ORM\DataObject;

class WeaponUpgrade extends DataObject
{
    private static $categories = [
        "Upgrade",
        "Ammo",
        "Grenade",
        "Missile",
        "Downgrade",
        "Round",
        "Artillery",
        "Any",
    ];

    private static $table_name = 'WeaponUpgrade';

    private static $db = [
        'Sort' => 'Int',
        'Name' => 'Varchar',
        'Category' => 'Enum("Ranged, Melee, Any", "Ranged")',
        'Type' => 'Varchar',
        'Group' => 'Varchar',
        'Class' => 'Varchar',
        'DamType' => 'Varchar',
        'Range' => 'Varchar',
        'SingleShot' => 'Decimal',
        'SemiBurst' => 'Decimal',
        'FullBurst' => 'Decimal',
        'Numdice' => 'Int',
        'Dice' => 'Varchar',
        'DamBonus' => 'Varchar',
        'Type' => 'Varchar',
        'Pen' => 'Varchar',
        'ClipSize' => 'Varchar',
        'AttBonus' => 'Varchar',
        'numHands' => 'Varchar',
        'Special' => 'Text',
        'Wt' => 'Varchar',
        'Cost' => 'Varchar',
        'Renown' => 'Varchar',
        'Availability' => 'Varchar',
        'Page' => 'Int',
    ];

    private static $has_one = [
        'Source' => Source::class,
    ];

    private static $summary_fields = [
        'Sort',
        'Name',
        'Category',
    ];

    public function onBeforeWrite()
    {
        parent::onBeforeWrite();

        //link source
        if ($this->SourceName) {
            $src = Source::get()->find('Name', $this->SourceName);
            if (!$src->exists()) {
                $src = Source::create();
                $src->Name = $this->SourceName;
                $src->write();
            }
            $this->SourceID = $src->ID;
            $this->SourceName = null;
        }
    }
}
