<?php
/**
 * Created by PhpStorm.
 * User: mikhail
 * Date: 19.12.18
 * Time: 14:44
 */

namespace App\Domain;


use App\Domain\Exception\InvalidIdException;
use Ramsey\Uuid\Exception\InvalidUuidStringException;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

class Id
{
    protected $id;

    private function __construct(UuidInterface $uuid)
    {
        $this->id = $uuid->toString();
    }

    public function toString(): string
    {
        return $this->id;
    }

    public function __toString(): string
    {
        return $this->toString();
    }

    public function id(): string
    {
        return $this->id;
    }

    public function sameValueAs(self $otherId): bool
    {
        return $this->id() === $otherId->id();
    }

    public static function generate(): self
    {
        return new self(Uuid::uuid4());
    }

    public static function fromString(string $basketId): self
    {
        try {
            $uuid = Uuid::fromString($basketId);
        } catch (InvalidUuidStringException $e) {
            throw new InvalidIdException;
        }
        return new self($uuid);
    }
}