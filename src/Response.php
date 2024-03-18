<?php

declare(strict_types=1);

namespace Verdient\OneBound;

use Verdient\http\Response as HttpResponse;
use Verdient\HttpAPI\AbstractResponse;
use Verdient\HttpAPI\Result;

/**
 * 响应
 * @author Verdient。
 */
class Response extends AbstractResponse
{
    /**
     * @inheritdoc
     * @author Verdient。
     */
    protected function normailze(HttpResponse $response): Result
    {
        $result = new Result();
        $statusCode =  $response->getStatusCode();
        $body = $response->getBody();
        if ($statusCode === 200) {
            if (isset($body['error_code']) && $body['error_code'] == '0000' && isset($body['item'])) {
                $result->isOK = true;
                $result->data = $body;
            }
        }
        if (!$result->isOK) {
            $result->errorCode = $body['error_code'] ?? $statusCode;
            $result->errorMessage = $body['error'] ?? $response->getStatusMessage();
        }
        return $result;
    }
}
