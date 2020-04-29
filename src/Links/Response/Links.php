<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 14/02/2019
 * Time: 18:57
 */

namespace XzSoftware\WykopSDK\Links\Response;

use XzSoftware\WykopSDK\ResponseObjects\Link;
use XzSoftware\WykopSDK\ResponseObjects\Pagination;

class Links
{
    /** @var Link[] */
    private $links;
    /** @var Pagination */
    private $pagination;

    /**
     * @param Link[] $links
     */
    public function __construct(array $links, Pagination $pagination)
    {
        $this->links = $links;
        $this->pagination = $pagination;
    }

    public function getLinks(): array
    {
        return $this->links;
    }

    public function getPagination(): Pagination
    {
        return $this->pagination;
    }
}
