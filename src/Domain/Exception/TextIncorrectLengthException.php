<?php
/**
 * Created by PhpStorm.
 * User: mikhail
 * Date: 19.12.18
 * Time: 14:12
 */

namespace App\Domain\Exception;


class TextIncorrectLengthException extends \DomainException
{
    private const ERROR_MSG = 'Incorrect text length';

    public function __construct(string $message = self::ERROR_MSG)
    {
        parent::__construct($message);
    }
}