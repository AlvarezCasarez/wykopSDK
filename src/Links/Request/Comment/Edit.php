<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 16/02/2019
 * Time: 21:33
 */

namespace XzSoftware\WykopSDK\Links\Request\Comment;

class Edit extends AbstractComment
{
    /** @var int */
    private $id;

    /**
     * CommentAdd constructor.
     * @param int $id
     * @param string $body
     * @param string|resource|null $embed
     */
    public function __construct(int $id, string $body, $embed = null)
    {
        $this->id = $id;

        parent::__construct($body, $embed);
    }

    public function getPrefix(): string
    {
        return 'Links/CommentEdit/' . $this->id . '/';
    }
}
