<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 27/01/2019
 * Time: 13:47
 */

namespace XzSoftware\WykopSDK\ResponseObjects;

class Entry
{
    /** @var int */
    private $id;
    /** @var \DateTime */
    private $createdAt;
    /** @var string */
    private $body;
    /** @var User */
    private $author;
    /** @var ?User */
    private $receiver;
    /** @var bool */
    private $blocked;
    /** @var bool */
    private $favourite;
    /** @var int */
    private $voteCount;
    /** @var int */
    private $commentsCount;
    /** @var array|Comment[] */
    private $comments;
    /** @var Survey|null */
    private $survey;
    /** @var Embed|null */
    private $embed;
    /** @var string */
    private $status;
    /** @var bool */
    private $canComment;
    /** @var int 0 / 1 */
    private $userVote;
    /** @var string|null */
    private $app;
    /** @var string|null */
    private $violationUrl;

    public static function buildFromRaw(array $data): Entry
    {
        $comments = self::prepareComments($data);

        return new Entry(
            $data['id'],
            new \DateTime($data['date']),
            $data['body'],
            User::buildFromRaw($data['author']),
            !empty($data['receiver']) ? User::buildFromRaw($data['receiver']) : null,
            $data['blocked'],
            $data['favorite'],
            $data['vote_count'],
            $data['comments_count'],
            $comments,
            !empty($data['survey']) ? Survey::buildFromRaw($data['survey']) : null,
            !empty($data['embed']) ? Embed::buildFromRaw($data['embed']) : null,
            $data['status'] ?? null,
            $data['can_comment'] ?? null,
            $data['user_vote'] ?? 0,
            $data['app'] ?? null,
            $data['violation_url'] ?? null
        );
    }

    public function __construct(
        int $id,
        \DateTime $createdAt,
        string $body,
        User $author,
        ?User $receiver,
        ?bool $blocked,
        ?bool $favourite,
        ?int $voteCount,
        ?int $commentsCount,
        array $comments,
        ?Survey $survey,
        ?Embed $embed,
        ?string $status,
        ?bool $canComment,
        ?int $userVote,
        ?string $app,
        ?string $violationUrl
    ) {
        $this->id = $id;
        $this->createdAt = $createdAt;
        $this->body = $body;
        $this->author = $author;
        $this->receiver = $receiver;
        $this->blocked = $blocked;
        $this->favourite = $favourite;
        $this->voteCount = $voteCount;
        $this->commentsCount = $commentsCount;
        $this->comments = $comments;
        $this->survey = $survey;
        $this->embed = $embed;
        $this->status = $status;
        $this->canComment = $canComment;
        $this->userVote = $userVote;
        $this->app = $app;
        $this->violationUrl = $violationUrl;
    }

    /**
     * @param array $data
     * @return array|Comment[]
     */
    protected static function prepareComments(array $data): array
    {
        $result = [];

        if (!empty($data['comments'])) {
            foreach ($data['comments'] as $comment) {
                $result[] = Comment::buildFromRaw($comment);
            }
        }

        return $result;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    public function getBody(): string
    {
        return $this->body;
    }

    public function getAuthor(): User
    {
        return $this->author;
    }

    public function getReceiver(): ?User
    {
        return $this->receiver;
    }

    public function isBlocked(): ?bool
    {
        return $this->blocked;
    }

    public function isFavourite(): ?bool
    {
        return $this->favourite;
    }

    public function getVoteCount(): ?int
    {
        return $this->voteCount;
    }

    public function getCommentsCount(): ?int
    {
        return $this->commentsCount;
    }

    /**
     * @return array|Comment[]
     */
    public function getComment(): array
    {
        return $this->comments;
    }

    public function getSurvey(): ?Survey
    {
        return $this->survey;
    }

    public function getEmbed(): ?Embed
    {
        return $this->embed;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function isCanComment(): ?bool
    {
        return $this->canComment;
    }

    public function getUserVote(): ?int
    {
        return $this->userVote;
    }

    public function getApp(): ?string
    {
        return $this->app;
    }

    public function getViolationUrl(): ?string
    {
        return $this->violationUrl;
    }
}
