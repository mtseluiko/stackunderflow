<?php
/**
 * Created by PhpStorm.
 * User: mikhail
 * Date: 19.12.18
 * Time: 14:24
 */

namespace App\Domain\Exception;


class InvalidIdException extends \DomainException
{
    private const ERROR_MSG = 'Invalid user id';

    public function __construct(string $message = self::ERROR_MSG)
    {
        parent::__construct($message);
    }
}