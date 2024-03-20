<?php

declare(strict_types=1);

namespace Verdient\OneBound;

use Verdient\HttpAPI\AbstractClient;

/**
 * 万邦
 * @author Verdient。
 */
class OneBound extends AbstractClient
{
    /**
     * 秘钥标识
     * @author Verdient。
     */
    protected $accessKey;

    /**
     * 秘钥
     * @author Verdient。
     */
    protected string $accessSecret;

    /**
     * 代理主机
     * @author Verdient。
     */
    protected string|null $proxyHost = null;

    /**
     * 代理端口
     * @author Verdient。
     */
    protected int|string|null $proxyPort = null;

    /**
     * @inheritdoc
     * @author Verdient。
     */
    public $request = Request::class;

    /**
     * @inheritdoc
     * @author Verdient。
     */
    public function request($path): Request
    {
        /**
         * @var Request
         */
        $request = parent::request($path);
        $request->accessKey = $this->accessKey;
        $request->accessSecret = $this->accessSecret;
        if ($this->proxyHost) {
            $request->setProxy($this->proxyHost, empty($this->proxyPort) ? null : intval($this->proxyPort));
        }
        return $request;
    }
}
