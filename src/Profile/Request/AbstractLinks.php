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

use XzSoftware\WykopSDK\Builders\LinksBuilder;
use XzSoftware\WykopSDK\RequestObjects\GetObject;

abstract class AbstractLinks extends GetObject
{
    protected $login;

    public function __construct(string $login, ?int $page = null)
    {
        $this->login = $login;

        $this->setPage($page);
    }

    public function setLogin(string $login): self
    {
        $this->login = $login;

        return $this;
    }

    public function setPage(?int $page): self
    {
        if (null !== $page) {
            $this->urlParams['page'] = $page;
        }

        return $this;
    }

    abstract public function getPrefix(): string;

    public function isValid(): bool
    {
        return null !== $this->login;
    }

    public function getResponseBuilder(): LinksBuilder
    {
        return new LinksBuilder();
    }
}
