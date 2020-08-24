<?php
namespace extas\components\http;

use extas\interfaces\http\IHasPsrRequest;
use extas\interfaces\http\IHasPsrResponse;

/**
 * Trait THasHttpIO
 *
 * @package extas\components\http
 * @author jeyroik <jeyroik@gmail.com>
 */
trait THasHttpIO
{
    use THasPsrRequest;
    use THasPsrResponse;

    /**
     * @param array $args
     * @return array
     */
    public function getHttpIO(array $args = []): array
    {
        $args[IHasPsrRequest::FIELD__PSR_REQUEST] = $this->getPsrRequest();
        $args[IHasPsrResponse::FIELD__PSR_RESPONSE] = $this->getPsrResponse();
        $args[IHasPsrRequest::FIELD__ARGUMENTS] = $this->getArguments();

        return $args;
    }
}
