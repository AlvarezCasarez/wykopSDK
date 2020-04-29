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

use XzSoftware\WykopSDK\Links\Builder\CommentBuilder;
use XzSoftware\WykopSDK\RequestObjects\EmbeddableObject;

abstract class AbstractComment extends EmbeddableObject
{
    public function isValid(): bool
    {
        return true;
    }

    public function getResponseBuilder(): CommentBuilder
    {
        return new CommentBuilder();
    }
}
