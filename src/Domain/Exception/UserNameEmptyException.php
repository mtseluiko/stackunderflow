<?php
/**
 * Created by PhpStorm.
 * User: mikhail
 * Date: 19.12.18
 * Time: 14:11
 */

namespace App\Domain\Exception;


class UserNameEmptyException extends \DomainException
{
    private const ERROR_MSG = 'Username can\'t be empty';

    public function __construct(string $message = self::ERROR_MSG)
    {
        parent::__construct($message);
    }
}