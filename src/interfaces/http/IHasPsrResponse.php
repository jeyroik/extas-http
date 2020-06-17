<?php
namespace extas\interfaces\http;

use Psr\Http\Message\ResponseInterface;

/**
 * Interface IHasResponse
 *
 * @package extas\interfaces\http
 * @author jeyroik@gmail.com
 */
interface IHasPsrResponse
{
    public const FIELD__PSR_RESPONSE = 'psr_response';

    /**
     * @return ResponseInterface
     */
    public function getPsrResponse(): ResponseInterface;

    /**
     * @param ResponseInterface $response
     * @return $this
     */
    public function setPsrResponse(ResponseInterface $response);
}
