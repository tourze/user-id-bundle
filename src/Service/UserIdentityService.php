<?php

namespace Tourze\UserIDBundle\Service;

use Symfony\Component\Security\Core\User\UserInterface;
use Tourze\UserIDBundle\Contracts\UserIdentityInterface;

/**
 * 查找身份信息
 */
interface UserIdentityService
{
    public function findByType(string $type, string $value): ?UserIdentityInterface;

    /**
     * @return iterable<UserIdentityInterface>
     */
    public function findByUser(UserInterface $user): iterable;
}
