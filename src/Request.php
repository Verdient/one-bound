<?php

declare(strict_types=1);

namespace Verdient\OneBound;

use Verdient\http\Request as HttpRequest;

/**
 * 请求
 * @author Verdient。
 */
class Request extends HttpRequest
{
    /**
     * @var string 秘钥标识
     * @author Verdient。
     */
    public $accessKey;

    /**
     * @var string 秘钥
     * @author Verdient。
     */
    public $accessSecret;

    /**
     * @inheritdoc
     * @author Verdient。
     */
    protected function getLogGroup()
    {
        return 'oneBound';
    }

    /**
     * @inheritdoc
     * @author Verdient。
     */
    public function send(): Response
    {
        $this->addQuery('key', $this->accessKey);
        $this->addQuery('secret', $this->accessSecret);
        $response = new Response(parent::send());
        return $response;
    }
}
