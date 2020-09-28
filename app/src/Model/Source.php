<?php

namespace App\Model;

use SilverStripe\ORM\DataObject;

class Source extends DataObject
{
    private static $table_name = 'Source';

    private static $db = [
        'Name' => 'Varchar',
        'Key' => 'Varchar',
    ];

    public function obBeforeWrite()
    {
        if (!$this->Key) {
            $this->Key = urlencode($this->Name);
        }
    }

    private static $summary_fields = [
        'Name',
        'Key',
    ];
}
