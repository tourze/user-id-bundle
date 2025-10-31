<?php

declare(strict_types=1);

namespace Tourze\UserIDBundle\Tests\Model;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use Tourze\UserIDBundle\Model\SystemUser;

/**
 * @internal
 */
#[CoversClass(SystemUser::class)]
final class SystemUserTest extends TestCase
{
    public function testToStringReturnsUserIdentifier(): void
    {
        $user = new SystemUser();
        $this->assertEquals('system', (string) $user);
    }

    public function testGetRolesReturnsAdminRole(): void
    {
        $user = new SystemUser();
        $roles = $user->getRoles();
        $this->assertContains('ROLE_ADMIN', $roles);
        $this->assertCount(1, $roles);
    }

    public function testSerializeReturnsEmptyArray(): void
    {
        $user = new SystemUser();
        $serialized = $user->__serialize();

        $this->assertIsArray($serialized);
        $this->assertEmpty($serialized);
    }

    public function testGetUserIdentifierReturnsSystem(): void
    {
        $user = new SystemUser();
        $this->assertEquals('system', $user->getUserIdentifier());
    }

    public function testEraseCredentialsDoesNotThrowException(): void
    {
        $user = new SystemUser();
        /** @phpstan-ignore method.deprecated */
        $user->eraseCredentials();

        $this->expectNotToPerformAssertions();
    }
}
