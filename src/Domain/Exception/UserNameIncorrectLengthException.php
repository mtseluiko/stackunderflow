<?php
/**
 * Created by PhpStorm.
 * User: mikhail
 * Date: 19.12.18
 * Time: 14:12
 */

namespace App\Domain\Exception;


class UserNameIncorrectLengthException extends \DomainException
{
    private const ERROR_MSG = 'Incorrect username length';

    public function __construct(string $message = self::ERROR_MSG)
    {
        parent::__construct($message);
    }
}