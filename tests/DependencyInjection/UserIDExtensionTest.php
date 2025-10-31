<?php

declare(strict_types=1);

namespace Tourze\UserIDBundle\Tests\DependencyInjection;

use PHPUnit\Framework\Attributes\CoversClass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Tourze\PHPUnitSymfonyUnitTest\AbstractDependencyInjectionExtensionTestCase;
use Tourze\UserIDBundle\DependencyInjection\UserIDExtension;

/**
 * @internal
 */
#[CoversClass(UserIDExtension::class)]
final class UserIDExtensionTest extends AbstractDependencyInjectionExtensionTestCase
{
    protected function getExtension(): UserIDExtension
    {
        return new UserIDExtension();
    }

    public function testLoadLoadsServicesPhp(): void
    {
        $container = new ContainerBuilder();
        $container->setParameter('kernel.environment', 'test');
        $extension = new UserIDExtension();

        $extension->load([], $container);

        // 验证服务定义存在
        $this->assertTrue($container->has('Tourze\UserIDBundle\Service\UserIdentityServiceImpl'));
    }

    public function testLoadWithEmptyConfigsDoesNotThrowException(): void
    {
        $this->expectNotToPerformAssertions();

        $container = new ContainerBuilder();
        $container->setParameter('kernel.environment', 'test');
        $extension = new UserIDExtension();
        $extension->load([], $container);
    }
}
