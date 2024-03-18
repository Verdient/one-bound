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
     * @var string 秘钥标识
     * @author Verdient。
     */
    protected $accessKey;

    /**
     * @var string 秘钥
     * @author Verdient。
     */
    protected $accessSecret;

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
        return $request;
    }
}
