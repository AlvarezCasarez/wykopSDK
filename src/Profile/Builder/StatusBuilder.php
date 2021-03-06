<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 27/01/2019
 * Time: 22:28
 */

namespace XzSoftware\WykopSDK\Profile\Builder;

use XzSoftware\WykopSDK\Profile\Response\Status;

class StatusBuilder
{
    public function build(array $data): Status
    {
        return new Status(
            $data['is_observed'],
            $data['is_blocked']
        );
    }
}
