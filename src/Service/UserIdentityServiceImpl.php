<?php

declare(strict_types=1);

namespace Tourze\UserIDBundle\Service;

use Symfony\Component\DependencyInjection\Attribute\AsAlias;
use Symfony\Component\DependencyInjection\Attribute\Autoconfigure;
use Symfony\Component\Security\Core\User\UserInterface;
use Tourze\UserIDBundle\Contracts\IdentityInterface;

#[AsAlias(id: UserIdentityService::class, public: true)]
#[Autoconfigure(public: true)]
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
