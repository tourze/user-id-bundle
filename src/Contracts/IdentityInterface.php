<?php

declare(strict_types=1);

namespace Tourze\UserIDBundle\Contracts;

use Symfony\Component\Security\Core\User\UserInterface;

/**
 * 用户身份
 * 一个User可能关联很多个身份的，一般来讲我们知道他的身份就知道他是谁了
 *
 * @see https://www.biaodianfu.com/customer-user-account-model.html
 */
interface IdentityInterface
{
    /**
     * 一个用户有且只能关联一个客户
     */
    public function getUser(): ?UserInterface;

    /**
     * 一个用户能使用多个账户
     *
     * @return AccountInterface[]
     */
    public function getAccounts(): array;

    /**
     * 身份值
     */
    public function getIdentityValue(): string;

    /**
     * 身份类型
     */
    public function getIdentityType(): string;

    /**
     * 身份数组
     *
     * @return \Traversable<string, mixed>
     */
    public function getIdentityArray(): \Traversable;
}
