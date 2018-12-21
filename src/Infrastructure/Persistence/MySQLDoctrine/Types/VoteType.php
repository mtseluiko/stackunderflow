<?php
/**
 * Created by PhpStorm.
 * User: mikhail
 * Date: 20.12.18
 * Time: 17:06
 */

namespace App\Infrastructure\Persistence\MySQLDoctrine\Types;

use App\Domain\Exception\IncorrectVoteTypeException;
use App\Domain\Vote;
use App\Infrastructure\Persistence\MySQLDoctrine\Exception\IncorrectVoteTypeMySQLRepresentation;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;

class VoteType extends Type
{
    const TYPE_NAME = 'vote_type';

    const VOTE_LIKE_TYPE_REPRESENTATION = 0;
    const VOTE_DISLIKE_TYPE_REPRESENTATION = 1;

    public function getSqlDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
    {
        return $platform->getSmallIntTypeDeclarationSQL($fieldDeclaration);
    }

    /**
     * @param mixed $value
     * @param AbstractPlatform $platform
     * @return string
     * @throws IncorrectVoteTypeMySQLRepresentation
     */
    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        switch($value) {
            case self::VOTE_LIKE_TYPE_REPRESENTATION:
                return Vote::VOTE_LIKE_TYPE;
            case self::VOTE_DISLIKE_TYPE_REPRESENTATION:
                return Vote::VOTE_DISLIKE_TYPE;
            default:
                throw new IncorrectVoteTypeMySQLRepresentation;
        }
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {

        switch($value) {
            case Vote::VOTE_LIKE_TYPE:
                return self::VOTE_LIKE_TYPE_REPRESENTATION;
            case Vote::VOTE_DISLIKE_TYPE:
                return self::VOTE_DISLIKE_TYPE_REPRESENTATION;
            default:
                throw new IncorrectVoteTypeException;
        }
    }

    public function getName()
    {
        return self::TYPE_NAME;
    }
}