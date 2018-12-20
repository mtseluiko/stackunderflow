<?php
/**
 * Created by PhpStorm.
 * User: mikhail
 * Date: 19.12.18
 * Time: 15:05
 */

namespace App\Domain\Exception;


class RateOwnQuestionException extends \DomainException
{
    private const ERROR_MSG = 'Can\'t rate own questions';

    public function __construct(string $message = self::ERROR_MSG)
    {
        parent::__construct($message);
    }
}