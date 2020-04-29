<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 26/01/2019
 * Time: 17:30
 */

namespace XzSoftware\WykopSDK\ResponseObjects;

use DateTime;

class User
{
    /** @var string */
    private $login;
    /** @var int */
    private $color;
    /** @var string|null */
    private $sex;
    /** @var string */
    private $avatar;
    /** @var DateTime|null */
    private $signupAt;
    /** @var string|null */
    private $background;
    /** @var bool|null */
    private $isVerified;
    /** @var bool|null */
    private $isObserved;
    /** @var bool|null */
    private $isBlocked;
    /** @var string|null */
    private $violationUrl;
    /** @var UserDetails */
    private $userDetails;
    /** @var UserCounts */
    private $userCounts;

    public function __construct(
        string $login,
        int $color,
        ?string $sex,
        string $avatar,
        UserDetails $details,
        UserCounts $counts,
        ?DateTime $signupAt = null,
        ?string $background = null,
        ?bool $isVerified = null,
        ?bool $isObserved = null,
        ?bool $isBlocked = null,
        ?string $violationUrl = null
    ) {
        $this->login = $login;
        $this->color = $color;
        $this->sex = $sex;
        $this->avatar = $avatar;
        $this->signupAt = $signupAt;
        $this->background = $background;
        $this->isVerified = $isVerified;
        $this->isObserved = $isObserved;
        $this->isBlocked = $isBlocked;
        $this->violationUrl = $violationUrl;
        $this->userDetails = $details;
        $this->userCounts = $counts;
    }

    public static function buildFromRaw(array $data): self
    {
        $userDetails = self::prepareUserDetails($data);
        $userCounts = self::prepareUserCounts($data);

        $user = new User(
            $data['login'],
            $data['color'],
            $data['sex'] ?? null,
            $data['avatar'],
            $userDetails,
            $userCounts,
            !empty($data['signup_at']) ? new DateTime($data['signup_at']) : null,
            $data['background'] ?? null,
            $data['is_verified'] ?? null,
            $data['is_observed'] ??  null,
            $data['is_blocked'] ?? null,
            $data['violation_url'] ?? null
        );

        return $user;
    }

    private static function prepareUserDetails(array $data): UserDetails
    {
        $userDetails = new UserDetails(
            $data['email'] ?? null,
            $data['about'] ?? null,
            $data['name'] ?? null,
            $data['www'] ?? null,
            $data['jabber'] ?? null,
            $data['gg'] ?? null,
            $data['city'] ?? null,
            $data['facebook'] ?? null,
            $data['twitter'] ?? null,
            $data['instagram'] ?? null
        );

        return $userDetails;
    }

    private static function prepareUserCounts(array $data): UserCounts
    {
        $userCounts = new UserCounts(
            $data['links_added_count'] ?? null,
            $data['links_published_count'] ?? null,
            $data['comments_count'] ?? null,
            $data['rank'] ?? null,
            $data['followers'] ?? null,
            $data['following'] ?? null,
            $data['entries'] ?? null,
            $data['entriesComments'] ?? null,
            $data['diggs'] ?? null,
            $data['buries'] ?? null
        );

        return $userCounts;
    }

    public function getLogin(): string
    {
        return $this->login;
    }

    public function getColor(): int
    {
        return $this->color;
    }

    public function getSex(): ?string
    {
        return $this->sex;
    }

    public function getAvatar(): string
    {
        return $this->avatar;
    }

    public function getSignupAt(): ?DateTime
    {
        return $this->signupAt;
    }

    public function getBackground(): ?string
    {
        return $this->background;
    }

    public function isVerified(): ?bool
    {
        return $this->isVerified;
    }

    public function isObserved(): ?bool
    {
        return $this->isObserved;
    }

    public function isBlocked(): ?bool
    {
        return $this->isBlocked;
    }

    public function getViolationUrl(): ?string
    {
        return $this->violationUrl;
    }

    public function getUserDetails(): UserDetails
    {
        return $this->userDetails;
    }

    public function getUserCounts() : UserCounts
    {
        return $this->userCounts;
    }
}
