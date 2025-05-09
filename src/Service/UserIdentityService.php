<?php

namespace Tourze\UserIDBundle\Service;

use Symfony\Component\Security\Core\User\UserInterface;
use Tourze\UserIDBundle\Contracts\IdentityInterface;

/**
 * 查找身份信息
 */
interface UserIdentityService
{
    public function findByType(string $type, string $value): ?IdentityInterface;

    /**
     * @return iterable<IdentityInterface>
     */
    public function findByUser(UserInterface $user): iterable;
}
