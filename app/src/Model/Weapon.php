<?php

namespace App\Model;

use App\Model\WeaponQuality;
use SilverStripe\Forms\GridField\GridFieldDataColumns;
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

    private static $summary_fields = [
        'Name',
        'Category',
        'Group',
        'Class',
        'Type',
        'Wt',
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $qual_grid = $fields->dataFieldByName('Qualities');
        if ($qual_grid->exists()) {
            $config = $qual_grid->getConfig();
            $cols = $config->getComponentByType(GridFieldDataColumns::class);
            if ($cols) {
                $disfields = $cols->getDisplayFields($qual_grid);
                $disfields["Level"] = 'Level';
                $cols->setDisplayFields($disfields);
            }
        }

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
                preg_match('/^[^\(]+/m', $special, $matches);
                $name = trim($matches[0]);
                $existing = WeaponQuality::get()->find('Name', $name);
                if (!$existing) {
                    $new = WeaponQuality::create();
                    $new->Name = $special;
                    $new->write();
                    $existing = $new;
                }
                // check for a level
                preg_match('/\((.*?)\)/m', $special, $level);
                if (isset($level[1])) {
                    $this->Qualities()->add($existing, ["Level" => $level[1]]);
                } else {
                    $this->Qualities()->add($existing);
                }
            }
            $this->SpecialList = null;
        }

        //link source
        if ($this->SourceName) {
            $src = Source::get()->find('Name', $this->SourceName);
            if (!$src) {
                $src = Source::create();
                $src->Name = $this->SourceName;
                $src->write();
            }
            $this->SourceID = $src->ID;
            $this->SourceName = null;
        }
    }

}
