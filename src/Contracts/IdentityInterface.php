<?php

namespace Tourze\UserIDBundle\Contracts;

use Symfony\Component\Security\Core\User\UserInterface;

/**
 * 用户身份
 * 一个User可能关联很多个身份的，一般来讲我们知道他的身份就知道他是谁了
 */
interface IdentityInterface
{
    /**
     * 关联主用户信息
     */
    public function getUser(): ?UserInterface;

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
     */
    public function getIdentityArray(): \Traversable;
}
