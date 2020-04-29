<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 27/01/2019
 * Time: 14:03
 */

namespace XzSoftware\WykopSDK\ResponseObjects;

class Comment
{
    /** @var int */
    private $id;
    /** @var \DateTime */
    private $createdAt;
    /** @var User */
    private $author;
    /** @var int */
    private $voteCount;
    /** @var string */
    private $body;
    /** @var string */
    private $status;
    /** @var int */
    private $userVote;
    /** @var bool */
    private $blocked;
    /** @var bool */
    private $favorite;
    /** @var int|null */
    private $link;
    /** @var Embed|null */
    private $embed;
    /** @var string|null */
    private $app;
    /** @var string|null */
    private $violationUrl;
    /** @var int|null */
    private $voteCountMinus;
    /** @var int|null */
    private $voteCountPlus;
    /** @var string|null */
    private $original;
    /** @var int|null */
    private $parentId;
    /** @var bool|null */
    private $canVote;

    public static function buildFromRaw(array $data): Comment
    {
        return new Comment(
            $data['id'],
            new \DateTime($data['date']),
            User::buildFromRaw($data['author']),
            $data['vote_count'],
            $data['body'],
            $data['status'],
            $data['user_vote'],
            $data['blocked'],
            $data['favorite'],
            $data['link_id'] ?? null,
            !empty($data['embed']) ? Embed::buildFromRaw($data['embed']) : null,
            $data['app'] ?? null,
            $data['violation_url'] ?? null,
            $data['vote_count_plus'] ?? null,
            $data['vote_count_minus'] ?? null,
            $data['original'] ?? null,
            $data['parent_id'] ?? null,
            $data['can_vote'] ?? null
        );
    }

    public function __construct(
        int $id,
        \DateTime $createdAt,
        User $author,
        int $voteCount,
        string $body,
        string $status,
        int $userVote,
        bool $blocked,
        bool $favorite,
        ?int $link,
        ?Embed $embed,
        ?string $app,
        ?string $violationUrl,
        ?int $voteCountPlus,
        ?int $voteCountMinus,
        ?string $original,
        ?int $parentId,
        ?bool $canVote
    ) {
        $this->id = $id;
        $this->createdAt = $createdAt;
        $this->author = $author;
        $this->voteCount = $voteCount;
        $this->voteCountPlus = $voteCountPlus;
        $this->body = $body;
        $this->parentId = $parentId;
        $this->status = $status;
        $this->canVote = $canVote;
        $this->userVote = $userVote;
        $this->blocked = $blocked;
        $this->favorite = $favorite;
        $this->link = $link;
        $this->embed = $embed;
        $this->app = $app;
        $this->violationUrl = $violationUrl;
        $this->voteCountMinus = $voteCountMinus;
        $this->original = $original;
    }

    /**
     * @return int
     */
    public function getId() : int
    {
        return $this->id;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt() : \DateTime
    {
        return $this->createdAt;
    }

    /**
     * @return User
     */
    public function getAuthor() : User
    {
        return $this->author;
    }

    /**
     * @return int
     */
    public function getVoteCount() : int
    {
        return $this->voteCount;
    }

    /**
     * @return string
     */
    public function getBody() : string
    {
        return $this->body;
    }

    /**
     * @return string
     */
    public function getStatus() : string
    {
        return $this->status;
    }

    /**
     * @return int
     */
    public function getUserVote() : int
    {
        return $this->userVote;
    }

    /**
     * @return bool
     */
    public function isBlocked() : bool
    {
        return $this->blocked;
    }

    /**
     * @return bool
     */
    public function isFavorite() : bool
    {
        return $this->favorite;
    }

    /**
     * @return int|null
     */
    public function getLink() : ?int
    {
        return $this->link;
    }

    /**
     * @return Embed|null
     */
    public function getEmbed() : ?Embed
    {
        return $this->embed;
    }

    /**
     * @return string|null
     */
    public function getApp() : ?string
    {
        return $this->app;
    }

    /**
     * @return string|null
     */
    public function getViolationUrl() : ?string
    {
        return $this->violationUrl;
    }

    /**
     * @return int|null
     */
    public function getVoteCountMinus() : ?int
    {
        return $this->voteCountMinus;
    }

    /**
     * @return int|null
     */
    public function getVoteCountPlus() : ?int
    {
        return $this->voteCountPlus;
    }

    /**
     * @return string|null
     */
    public function getOriginal() : ?string
    {
        return $this->original;
    }

    /**
     * @return int|null
     */
    public function getParentId() : ?int
    {
        return $this->parentId;
    }

    /**
     * @return bool|null
     */
    public function getCanVote() : ?bool
    {
        return $this->canVote;
    }
}
