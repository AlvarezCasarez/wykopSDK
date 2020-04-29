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

use XzSoftware\WykopSDK\RequestObjects\GetObject;

class ToggleFavourite extends GetObject
{
    private $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    public function getPrefix(): string
    {
        return 'Entries/Favourite/' . $this->id . '/';
    }

    public function isValid(): bool
    {
        return true;
    }

    public function getResponseBuilder()
    {
        throw new \Exception('This method is not allowed here');
    }
}
