<?php

namespace App\Model;

use App\Model\Weapon;
use SilverStripe\Forms\NumericField;
use SilverStripe\ORM\DataObject;

class WeaponQuality extends DataObject
{
    private static $table_name = 'WeaponQuality';

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
    private static $summary_fields = [
        'Name',
        'Levelled',
        'SpecName',
    ];

    /**
     * CMS Fields
     * @return FieldList
     */
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        if ($this->hasField('Level') && $this->Levelled) {
            $fields->addFieldToTab(
                'Root.Main',
                NumericField::create('ManyMany[Level]', "Level")
            );
        }

        return $fields;
    }

    public function onBeforeWrite()
    {
        parent::onBeforeWrite();

        // check for a level
        preg_match('/\((.*?)\)/m', $this->Name, $level);

        if (isset($level[1])) {
            $this->Levelled = true;
            // remove level from name
            preg_match('/^[^\(]+/m', $this->Name, $name);
            $this->Name = trim($name[0]);
        }

    }
}
