<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 27/01/2019
 * Time: 22:20
 */

namespace XzSoftware\WykopSDK\Builders;

use XzSoftware\WykopSDK\ResponseObjects\Users;
use XzSoftware\WykopSDK\ResponseObjects\Pagination;
use XzSoftware\WykopSDK\ResponseObjects\User;

class UsersBuilder
{
    public function build(array $data): Users
    {
        $users = [];
        foreach ($data['data'] as $user) {
            $users[] = User::buildFromRaw($user);
        }

        return new Users(
            $users,
            Pagination::buildFromRaw(!empty($data['pagination']) ? $data['pagination'] : [])
        );
    }
}
