<?php

declare(strict_types=1);

namespace Tourze\UserIDBundle\Tests\Service;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\RunTestsInSeparateProcesses;
use Symfony\Component\Security\Core\User\UserInterface;
use Tourze\PHPUnitSymfonyKernelTest\AbstractIntegrationTestCase;
use Tourze\UserIDBundle\Service\UserIdentityService;
use Tourze\UserIDBundle\Service\UserIdentityServiceImpl;

/**
 * @internal
 */
#[CoversClass(UserIdentityServiceImpl::class)]
#[RunTestsInSeparateProcesses]
final class UserIdentityServiceImplTest extends AbstractIntegrationTestCase
{
    protected function onSetUp(): void
    {
        // No additional setup needed
    }

    public function testFindByTypeReturnsNull(): void
    {
        $service = self::getService(UserIdentityServiceImpl::class);
        $result = $service->findByType('email', 'test@example.com');
        $this->assertNull($result);
    }

    public function testFindByUserReturnsEmptyIterator(): void
    {
        $service = self::getService(UserIdentityServiceImpl::class);
        $user = $this->createMock(UserInterface::class);
        $result = $service->findByUser($user);

        $this->assertInstanceOf(\Traversable::class, $result);
        $this->assertCount(0, iterator_to_array($result));
    }

    public function testServiceImplementsUserIdentityService(): void
    {
        $service = self::getService(UserIdentityServiceImpl::class);
        $this->assertInstanceOf(UserIdentityService::class, $service);
    }
}
