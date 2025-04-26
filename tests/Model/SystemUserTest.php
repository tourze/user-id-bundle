<?php

namespace Tourze\UserIDBundle\Tests\Model;

use PHPUnit\Framework\TestCase;
use Tourze\UserIDBundle\Model\SystemUser;

class SystemUserTest extends TestCase
{
    public function test_toString_returnsUserIdentifier(): void
    {
        $user = new SystemUser();
        $this->assertEquals('system', (string)$user);
    }

    public function test_getRoles_returnsAdminRole(): void
    {
        $user = new SystemUser();
        $roles = $user->getRoles();

        $this->assertIsArray($roles);
        $this->assertContains('ROLE_ADMIN', $roles);
        $this->assertCount(1, $roles);
    }

    public function test_eraseCredentials_doesNotThrowException(): void
    {
        $user = new SystemUser();

        // 确保方法不抛出异常
        $exception = null;
        try {
            $user->eraseCredentials();
        } catch (\Exception $e) {
            $exception = $e;
        }

        $this->assertNull($exception);
    }

    public function test_getUserIdentifier_returnsSystem(): void
    {
        $user = new SystemUser();
        $this->assertEquals('system', $user->getUserIdentifier());
    }
}
