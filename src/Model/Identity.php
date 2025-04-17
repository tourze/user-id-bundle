<?php

namespace Tourze\UserIDBundle\Model;

use Tourze\Arrayable\Arrayable;

class Identity implements Arrayable
{
    public function __construct(
        private readonly string $id,
        private readonly string $identityType,
        private readonly string $identityValue,
        private readonly array $extra = [],
    ) {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getIdentityValue(): string
    {
        return $this->identityValue;
    }

    public function getIdentityType(): string
    {
        return $this->identityType;
    }

    public function getExtra(): array
    {
        return $this->extra;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'identityType' => $this->getIdentityType(),
            'identityValue' => $this->getIdentityValue(),
            ...$this->getExtra(),
        ];
    }
}
