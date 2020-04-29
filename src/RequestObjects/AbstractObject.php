<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 26/01/2019
 * Time: 15:12
 */

namespace XzSoftware\WykopSDK\RequestObjects;

abstract class AbstractObject implements ApiObjectInterface
{
    public const OUTPUT_FORMAT_CLEAR = 'clear';
    public const OUTPUT_FORMAT_ORIGINAL = 'original';
    public const OUTPUT_FORMAT_BOTH = 'both';

    /** @var array POST Params */
    protected $postParams = [];
    /** @var array url Params */
    protected $urlParams = [];
    /** @var array GET Params */
    protected $getParams = [];

    public function getSignerData(): array
    {
        $data = $this->postParams;
        ksort($data);
        return array_values($data);
    }

    public function setFullDataMode()
    {
        $this->urlParams['data'] = 'full';
    }

    public function setCompactedDataMode()
    {
        unset($this->urlParams['data']);
    }

    /**
     * Add additional data to response
     *
     * @param array $return
     * @return AbstractObject
     */
    public function setReturnData(array $return): self
    {
        $return = implode(',', $return);

        $this->urlParams['return'] = $return;

        return $this;
    }

    /**
     * Set format of text data - with HTML tags, without or both
     *
     * @param string $outputFormat
     * @return AbstractObject
     */
    public function setOutputFormat(string $outputFormat = self::OUTPUT_FORMAT_CLEAR): self
    {
        $this->urlParams['output'] = $outputFormat;

        return $this;
    }

    public function has($param): bool
    {
        return !empty($this->postParams[$param]) || !empty($this->urlParams[$param]);
    }

    public function getPostParams(): array
    {
        $params = $this->postParams;
        ksort($params);
        return $params;
    }

    public function getUrlParams(bool $prepared = false): array
    {
        $params = $this->urlParams;
        if ($prepared) {
            ksort($params);

            array_walk($params, function (&$value, $key) {
                $value = $key . '/' . $value;
            });
        }
        return $params;
    }

    public function getEndpoint(): string
    {
        $params = $this->getUrlParams(true);
        $urlParams = empty($params) ? '' : implode('/', $params) . '/';
        return $this->getPrefix() . $urlParams;
    }

    abstract public function getPrefix(): string;
}
