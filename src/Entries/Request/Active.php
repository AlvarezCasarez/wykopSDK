<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 28/01/2019
 * Time: 19:07
 */

namespace XzSoftware\WykopSDK\Entries\Request;

use XzSoftware\WykopSDK\Builders\EntriesBuilder;
use XzSoftware\WykopSDK\RequestObjects\GetObject;

class Active extends GetObject
{

    public function __construct(int $page = null)
    {
        if (!empty($page)) {
            $this->setPage($page);
        }
    }

    public function setPage(int $page): self
    {
        $this->urlParams['page'] = $page;

        return $this;
    }

    public function getPrefix(): string
    {
        return 'Entries/Active/';
    }

    public function isValid(): bool
    {
        return true;
    }

    public function getResponseBuilder(): EntriesBuilder
    {
        return new EntriesBuilder();
    }
}
