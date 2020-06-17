<?php
namespace extas\components\http;

use extas\components\protocols\ProtocolRunner;
use extas\interfaces\http\IHasPsrRequest;
use Psr\Http\Message\RequestInterface;

/**
 * Trait THasPsrRequest
 *
 * @property array $config
 *
 * @package extas\components\http
 * @author jeyroik@gmail.com
 */
trait THasPsrRequest
{
    /**
     * Run protocols to grab all request arguments.
     */
    public function applyProtocols(): void
    {
        ProtocolRunner::run(
            $this->config[IHasPsrRequest::FIELD__ARGUMENTS],
            $this->config[IHasPsrRequest::FIELD__PSR_REQUEST]
        );
    }

    /**
     * @return RequestInterface
     */
    public function getPsrRequest(): RequestInterface
    {
        return $this->config[IHasPsrRequest::FIELD__PSR_REQUEST];
    }

    /**
     * @return array
     */
    public function getArguments(): array
    {
        return $this->config[IHasPsrRequest::FIELD__ARGUMENTS] ?? [];
    }
}
