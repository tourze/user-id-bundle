<?php

namespace Tourze\UserIDBundle\Contracts;

use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @see https://www.biaodianfu.com/customer-user-account-model.html
 */
interface AccountInterface
{
    /**
     * 账户总是跟一个客户关联
     */
    public function getUser(): UserInterface;

    /**
     * 可以授权一个账号给多个用户身份
     *
     * @return IdentityInterface[]
     */
    public function getIdentities(): array;
}
