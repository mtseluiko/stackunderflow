<?php
/**
 * Created by PhpStorm.
 * User: mikhail
 * Date: 21.12.18
 * Time: 11:22
 */

namespace App\Infrastructure\Persistence\MySQLDoctrine\Exception;


class IncorrectVoteTypeMySQLRepresentation extends \Exception
{
    private const ERROR_MSG = 'Incorrect vote type MYSQL representation';

    public function __construct(string $message = self::ERROR_MSG)
    {
        parent::__construct($message);
    }
}