<?php

namespace Tourze\UserIDBundle\Service;

use Symfony\Component\DependencyInjection\Attribute\AsAlias;
use Symfony\Component\Security\Core\User\UserInterface;
use Tourze\UserIDBundle\Contracts\IdentityInterface;

#[AsAlias(UserIdentityService::class)]
class UserIdentityServiceImpl implements UserIdentityService
{
    public function findByType(string $type, string $value): ?IdentityInterface
    {
        return null;
    }

    public function findByUser(UserInterface $user): iterable
    {
        return new \ArrayIterator([]);
    }
}
