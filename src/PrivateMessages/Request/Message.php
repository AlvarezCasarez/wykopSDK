<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 17/02/2019
 * Time: 17:09
 */

namespace XzSoftware\WykopSDK\PrivateMessages\Request;

use XzSoftware\WykopSDK\RequestObjects\EmbeddableObject;

class Message extends EmbeddableObject
{
    /** @var string */
    private $receiver;

    /**
     * Message constructor.
     * @param string $receiver
     * @param string $body
     * @param string|resource $embed
     */
    public function __construct(string $receiver, string $body, $embed = null)
    {
        $this->receiver = $receiver;

        parent::__construct($body, $embed);
    }

    public function getPrefix(): string
    {
        return 'Pm/SendMessage/' . $this->receiver . '/';
    }

    public function isValid(): bool
    {
        return true;
    }

    public function getResponseBuilder()
    {
        // To do
    }
}
