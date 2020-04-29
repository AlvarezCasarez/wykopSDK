<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 17/02/2019
 * Time: 18:04
 */

namespace XzSoftware\WykopSDK\Search\Request;

use DateTime;
use XzSoftware\WykopSDK\Builders\LinksBuilder;
use XzSoftware\WykopSDK\RequestObjects\PostObject;

class Links extends PostObject
{
    public const TYPE_ALL = 'all';
    public const TYPE_PROMOTED = 'promoted';
    public const TYPE_ARCHIVED = 'archived';
    public const TYPE_DUPLICATES= 'duplicates';

    public const ORDER_BEST = 'best';
    public const ORDER_DIGS = 'diggs';
    public const ORDER_COMMENTS = 'comments';
    public const ORDER_NEW = 'new';

    public const TIMESPAN_ALL = 'all';
    public const TIMESPAN_TODAY = 'today';
    public const TIMESPAN_YESTERDAY = 'yesterday';
    public const TIMESPAN_WEEK = 'week';
    public const TIMESPAN_MONTH = 'month';
    public const TIMESPAN_RANGE = 'range';

    public const MIN_QUERY_LENGTH = 3;

    public function __construct(
        string $query,
        ?string $type = null,
        ?string $order = null,
        ?string $timespan = null,
        ?int $votes = null,
        ?DateTime $from = null,
        ?DateTime $to = null,
        ?int $page = null
    ) {
        $this->setQuery($query);
        $this->setPage($page);
        $this->setType($type);
        $this->setOrder($order);
        $this->setTimespan($timespan);
        $this->setVotes($votes);
        $this->setFrom($from);
        $this->setTo($to);
    }

    public function setQuery(string $query): self
    {
        $this->postParams['q'] = $query;
        return $this;
    }

    public function setType(?string $type): self
    {
        if (null !== $type) {
            $this->urlParams['what'] = $type;
        }

        return $this;
    }

    public function setOrder(?string $order): self
    {
        if (null !== $order) {
            $this->urlParams['sort'] = $order;
        }

        return $this;
    }

    public function setTimespan(?string $timespan): self
    {
        if (null !== $timespan) {
            $this->urlParams['when'] = $timespan;
        }

        return $this;
    }

    public function setVotes(?int $votes): self
    {
        if (null !== $votes) {
            $this->urlParams['votes'] = $votes;
        }

        return $this;
    }

    public function setFrom(?DateTime $from): self
    {
        if (null !== $from) {
            $this->urlParams['from'] = $from->format('Y-m-d');
        }

        return $this;
    }

    public function setTo(?DateTime $to): self
    {
        if (null !== $to) {
            $this->urlParams['to'] = $to->format('Y-m-d');
        }

        return $this;
    }

    public function setPage(?int $page): self
    {
        if (null !== $page) {
            $this->urlParams['page'] = $page;
        }

        return $this;
    }

    public function getPrefix(): string
    {
        return 'Search/Links/';
    }

    public function isValid(): bool
    {
        $queryValid = strlen($this->postParams['q']) > self::MIN_QUERY_LENGTH;

        $isTypeValid = $this->validateType();
        $isOrderValid = $this->validateSort();
        $isTimespanValid = $this->validateTimespan();
        $isRangeValid = $this->validateRange();

        return $queryValid && $isTypeValid && $isOrderValid && $isTimespanValid && $isRangeValid;
    }

    private function validateType(): bool
    {
        $isTypeValid = true;

        if (!empty($this->postParams['type'])) {
            $isTypeValid = in_array(
                $this->postParams['type'],
                [
                    self::TYPE_ALL,
                    self::TYPE_ARCHIVED,
                    self::TYPE_DUPLICATES,
                    self::TYPE_PROMOTED
                ]
            );
        }

        return $isTypeValid;
    }

    private function validateSort(): bool
    {
        $isOrderValid = true;

        if (!empty($this->postParams['sort'])) {
            $isOrderValid = in_array(
                $this->postParams['sort'],
                [
                    self::ORDER_NEW,
                    self::ORDER_BEST,
                    self::ORDER_COMMENTS,
                    self::ORDER_DIGS
                ]
            );
        }

        return $isOrderValid;
    }

    private function validateTimespan(): bool
    {
        $isTimespanValid = true;

        if (!empty($this->postParams['when'])) {
            $isTimespanValid = in_array(
                $this->postParams['when'],
                [
                    self::TIMESPAN_ALL,
                    self::TIMESPAN_MONTH,
                    self::TIMESPAN_RANGE,
                    self::TIMESPAN_TODAY,
                    self::TIMESPAN_WEEK,
                    self::TIMESPAN_YESTERDAY
                ]
            );
        }

        return $isTimespanValid;
    }

    private function validateRange(): bool
    {
        $isRangeValid = true;

        if (!empty($this->postParams['when']) && $this->postParams['when'] === self::TIMESPAN_RANGE) {
            $isRangeValid = $this->postParams['from']->getTimestamp() < $this->postParams['to']->getTimestamp();
        }

        return $isRangeValid;
    }

    public function getResponseBuilder(): LinksBuilder
    {
        return new LinksBuilder();
    }
}
