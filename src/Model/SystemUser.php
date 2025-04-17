<?php

namespace Tourze\UserIDBundle\Model;

use HughCube\StaticInstanceTrait;
use Symfony\Component\Security\Core\User\UserInterface;

class SystemUser implements UserInterface, \Stringable
{
    use StaticInstanceTrait;

    public function __toString(): string
    {
        return $this->getUserIdentifier();
    }

    public function getRoles(): array
    {
        return ['ROLE_ADMIN'];
    }

    public function eraseCredentials(): void
    {
        // TODO: Implement eraseCredentials() method.
    }

    public function getUserIdentifier(): string
    {
        return 'system';
    }
}
