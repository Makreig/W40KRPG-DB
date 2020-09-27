<?php

namespace App\Model;

use App\Model\WeaponQuality;
use SilverStripe\ORM\DataObject;

class Weapon extends DataObject
{
    private static $table_name = 'Weapon';

    private static $db = [
        'Sort' => 'Int',
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
        'SpecialList' => 'Text',
        'SpecialText' => 'HTMLText',
        'Wt' => 'Decimal',
        'Cost' => 'Decimal',
        'Renown' => 'Varchar',
        'Availability' => 'Varchar',
        'ShopSort' => 'Int',
        'SourceName' => 'Varchar',
        'Page' => 'Int',
    ];

    private static $has_one = [
        'Source' => Source::class,
    ];

    private static $many_many = [
        'Qualities' => WeaponQuality::class,
    ];

    private static $many_many_extraFields = [
        'Qualities' => [
            'Level' => 'Int',
        ],
    ];

    private static $indexes = [
        'KeyName' => ['Name', 'SourceID'],
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        return $fields;
    }

    public function onBeforeWrite()
    {
        parent::onBeforeWrite();

        // convert specials to relations
        if (!empty($this->SpecialList)) {
            $list = explode(',', $this->SpecialList);
            foreach ($list as $special) {
                // find or make Quality
                preg_match('/^[^\(]+/m', $this->SpecialList, $matches);
                $name = trim($matches[0]);
                $existing = WeaponQuality::get()->find('Name', $name);
                if (!$existing) {
                    $new = WeaponQuality::create();
                    $new->Name = $special;
                    $new->write();
                    $existing = $new;
                }
                $this->Qualities()->add($existing);
                // check for a level
                preg_match('/\((.*?)\)/m', $special, $level);
                if (isset($level[1])) {
                    $quality = $this->Qualities()->byID($existing->ID);
                    if ($quality) {
                        $quality->Level = (int) $level[1];
                    }
                }

                unset($list[$special]);
            }
            $this->SpecialList = null;
        }

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
