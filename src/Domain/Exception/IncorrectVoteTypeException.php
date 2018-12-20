<?php
/**
 * Created by PhpStorm.
 * User: mikhail
 * Date: 19.12.18
 * Time: 16:29
 */

namespace App\Domain\Exception;


class IncorrectVoteTypeException extends \DomainException
{
    private const ERROR_MSG = 'Incorrect vote type';

    public function __construct(string $message = self::ERROR_MSG)
    {
        parent::__construct($message);
    }
}