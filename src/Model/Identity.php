<?php

declare(strict_types=1);

namespace Tourze\UserIDBundle\Model;

use Tourze\Arrayable\Arrayable;

/**
 * @implements Arrayable<string, mixed>
 */
class Identity implements Arrayable
{
    /**
     * @param array<string, mixed> $extra
     */
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

    /**
     * @return array<string, mixed>
     */
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
