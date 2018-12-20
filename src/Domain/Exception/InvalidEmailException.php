<?php
/**
 * Created by PhpStorm.
 * User: mikhail
 * Date: 19.12.18
 * Time: 14:02
 */

namespace App\Domain\Exception;


class InvalidEmailException extends \DomainException
{
    private const ERROR_MSG = 'Invalid email address';

    public function __construct(string $message = self::ERROR_MSG)
    {
        parent::__construct($message);
    }
}