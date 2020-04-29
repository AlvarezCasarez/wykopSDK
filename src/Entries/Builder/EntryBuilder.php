<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 12/02/2019
 * Time: 22:35
 */
namespace XzSoftware\WykopSDK\Entries\Builder;

use XzSoftware\WykopSDK\ResponseObjects\Entry;

class EntryBuilder
{
    public function build(array $data): Entry
    {
        return Entry::buildFromRaw($data['data']);
    }
}
