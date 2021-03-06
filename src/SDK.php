<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 26/01/2019
 * Time: 13:38
 */

namespace XzSoftware\WykopSDK;

use GuzzleHttp\Client as HttpClient;
use XzSoftware\WykopSDK\AddLink\AddLink;
use XzSoftware\WykopSDK\Entries\Entries;
use XzSoftware\WykopSDK\Hits\Hits;
use XzSoftware\WykopSDK\Links\Links;
use XzSoftware\WykopSDK\MyWykop\MyWykop;
use XzSoftware\WykopSDK\Notifications\Notifications;
use XzSoftware\WykopSDK\PrivateMessages\PrivateMessages;
use XzSoftware\WykopSDK\Profile\Profiles;
use XzSoftware\WykopSDK\Search\Search;
use XzSoftware\WykopSDK\Settings\Settings;
use XzSoftware\WykopSDK\Suggest\Suggest;
use XzSoftware\WykopSDK\Tags\Tags;
use XzSoftware\WykopSDK\UserManagement\UserManagement;

class SDK
{
    public const API_PREFIX = 'https://a2.wykop.pl/';

    /** @var Client */
    private $client;

    private function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param string $appKey
     * @param string $appSecret
     * @return SDK
     */
    public static function buildNewSDK(string $appKey, string $appSecret)
    {
        return new self(
            new Client(new HttpClient(), new Signer($appSecret), $appKey, $appSecret)
        );
    }

    /**
     * UserManagment method - Login, WykopConnect handling
     * @link https://www.wykop.pl/dla-programistow/apiv2docs/package/Login/
     * @return UserManagement
     */
    public function auth(): UserManagement
    {
        return new UserManagement($this->client);
    }

    /**
     * Profiles managment
     * @link https://www.wykop.pl/dla-programistow/apiv2docs/package/Profiles/
     * @return Profiles
     */
    public function profiles(): Profiles
    {
        return new Profiles($this->client);
    }

    /**
     * Entries managment
     * @link https://www.wykop.pl/dla-programistow/apiv2docs/package/Entries/
     * @return Entries
     */
    public function entries(): Entries
    {
        return new Entries($this->client);
    }

    /**
     * AddLink module
     * @link https://www.wykop.pl/dla-programistow/apiv2docs/package/Addlink/
     * @return AddLink
     */
    public function addLink(): AddLink
    {
        return new AddLink($this->client);
    }

    /**
     * Hits module
     * @link https://www.wykop.pl/dla-programistow/apiv2docs/package/Hits/
     * @return Hits
     */
    public function hits(): Hits
    {
        return new Hits($this->client);
    }

    /**
     * Links module
     * @link https://www.wykop.pl/dla-programistow/apiv2docs/package/Links/
     * @return Links
     */
    public function links(): Links
    {
        return new Links($this->client);
    }

    /**
     * Tags module
     * @link https://www.wykop.pl/dla-programistow/apiv2docs/package/Tags/
     * @return Tags
     */
    public function tags(): Tags
    {
        return new Tags($this->client);
    }

    /**
     * MyWykop module
     * @link https://www.wykop.pl/dla-programistow/apiv2docs/package/Mywykop/
     * @return MyWykop
     */
    public function myWykop(): MyWykop
    {
        return new MyWykop($this->client);
    }

    /**
     * Notifications module
     * @link https://www.wykop.pl/dla-programistow/apiv2docs/package/Notifications/
     * @return Notifications
     */
    public function notifications(): Notifications
    {
        return new Notifications($this->client);
    }

    /**
     * PM module
     * @link https://www.wykop.pl/dla-programistow/apiv2docs/package/Pm/
     * @return PrivateMessages
     */
    public function privateMessages(): PrivateMessages
    {
        return new PrivateMessages($this->client);
    }

    /**
     * Search module
     * @link https://www.wykop.pl/dla-programistow/apiv2docs/package/Search/
     * @return Search
     */
    public function search(): Search
    {
        return new Search($this->client);
    }

    /**
     * Settings module
     * @link https://www.wykop.pl/dla-programistow/apiv2docs/package/Settings/
     * @return Settings
     */
    public function settings(): Settings
    {
        return new Settings($this->client);
    }

    /**
     * Suggest Module
     * @link https://www.wykop.pl/dla-programistow/apiv2docs/package/Settings/
     * @return Suggest
     */
    public function suggest(): Suggest
    {
        return new Suggest($this->client);
    }
}
