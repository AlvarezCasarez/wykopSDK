<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 15/02/2019
 * Time: 21:23
 */

namespace XzSoftware\WykopSDK\Links\Request\Comment;

class Add extends AbstractComment
{
    /** @var int */
    private $linkId;
    /** @var int */
    private $commentId;

    /**
     * CommentAdd constructor.
     *
     * @param int $linkId
     * @param string $body
     * @param int|null $commentId
     * @param string|resource|null $embed
     */
    public function __construct(int $linkId, string $body, ?int $commentId = null, $embed = null)
    {
        $this->linkId = $linkId;
        $this->commentId = $commentId;

        parent::__construct($body, $embed);
    }

    public function getPrefix(): string
    {
        if (!empty($this->commentId)) {
            return 'Links/CommentAdd/' . $this->linkId . '/' . $this->commentId . '/';
        }

        return 'Links/CommentAdd/' . $this->linkId . '/';
    }
}
