<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 14/02/2019
 * Time: 21:04
 */

namespace XzSoftware\WykopSDK\Links\Response;

use XzSoftware\WykopSDK\ResponseObjects\Pagination;

class Voters
{
    /** @var int */
    private $digs;
    /** @var int */
    private $buries;
    /** @var Vote[] */
    private $votes;
    /** @var Pagination */
    private $pagination;

    /**
     * @param int $digs
     * @param int $buries
     * @param Vote[] $votes
     * @param Pagination $pagination
     */
    public function __construct(int $digs, int $buries, array $votes, Pagination $pagination)
    {
        $this->digs = $digs;
        $this->buries = $buries;
        $this->votes = $votes;
        $this->pagination = $pagination;
    }

    public function getDigs(): int
    {
        return $this->digs;
    }

    public function getBuries(): int
    {
        return $this->buries;
    }

    /**
     * @return Vote[]
     */
    public function getVotes(): array
    {
        return $this->votes;
    }

    public function getPagination(): Pagination
    {
        return $this->pagination;
    }
}
