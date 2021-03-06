<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 26/01/2019
 * Time: 12:59
 */

namespace XzSoftware\WykopSDK\RequestObjects;

abstract class EmbeddableObject extends PostObject
{
    /**
     * CommentAdd constructor.
     * @param int $id
     * @param string $body
     * @param string|resource|null $embed
     */
    public function __construct(string $body, $embed = null)
    {
        $this->setBody($body);

        if (is_resource($embed)) {
            $this->setEmbedFile($embed);
        } elseif (!empty($embed) && is_string($embed)) {
            $this->setEmbedString($embed);
        }
    }

    public function setBody(string $body): self
    {
        $this->postParams['body'] = $body;

        return $this;
    }

    public function setEmbedString(string $embed): self
    {
        $this->postParams['embed'] = $embed;

        return $this;
    }

    public function setEmbedFile(resource $file)
    {
        $meta_data = stream_get_meta_data($file);
        $path = explode(DIRECTORY_SEPARATOR, $meta_data["uri"]);
        $fileName = array_pop($path);
        $this->files[$fileName] = $file;
    }
}
