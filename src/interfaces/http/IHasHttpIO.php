<?php
namespace extas\interfaces\http;

/**
 * Interface IHasHttpIO
 *
 * @package extas\interfaces\http
 * @author jeyroik <jeyroik@gmail.com>
 */
interface IHasHttpIO extends IHasPsrRequest, IHasPsrResponse
{
    /**
     * @param array $args
     * @return array
     */
    public function getHttpIO(array $args = []): array;
}
