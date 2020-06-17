<?php
namespace extas\components\http;

use extas\interfaces\http\IHasPsrResponse;
use Psr\Http\Message\ResponseInterface;

/**
 * Trait THasPsrResponse
 *
 * @property array $config
 *
 * @package extas\components\http
 * @author jeyroik@gmail.com
 */
trait THasPsrResponse
{
    /**
     * @return ResponseInterface
     */
    public function getPsrResponse(): ResponseInterface
    {
        return $this->config[IHasPsrResponse::FIELD__PSR_RESPONSE]
            ->withHeader('Content-type', 'application/json')
            ->withStatus(200);
    }

    /**
     * @param ResponseInterface $response
     * @return $this
     */
    public function setPsrResponse(ResponseInterface $response)
    {
        $this->config[IHasPsrResponse::FIELD__PSR_RESPONSE] = $response;

        return $this;
    }
}
