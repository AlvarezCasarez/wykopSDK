<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 27/01/2019
 * Time: 22:17
 */

namespace XzSoftware\WykopSDK\Profile\Request;

class DiggedLinks extends AbstractLinks
{
    public function getPrefix(): string
    {
        return 'Profiles/Digged/' . $this->login . '/';
    }
}
