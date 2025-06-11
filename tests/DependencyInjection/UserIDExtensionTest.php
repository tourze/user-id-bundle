<?php

namespace Tourze\UserIDBundle\Tests\DependencyInjection;

use PHPUnit\Framework\TestCase;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Tourze\UserIDBundle\DependencyInjection\UserIDExtension;

class UserIDExtensionTest extends TestCase
{
    private UserIDExtension $extension;
    private ContainerBuilder $container;

    protected function setUp(): void
    {
        $this->extension = new UserIDExtension();
        $this->container = new ContainerBuilder();
    }

    public function test_load_loadsServicesYaml(): void
    {
        $this->extension->load([], $this->container);

        // 验证服务定义存在
        $this->assertTrue($this->container->has('Tourze\UserIDBundle\Service\UserIdentityServiceImpl'));
    }

    public function test_load_withEmptyConfigs_doesNotThrowException(): void
    {
        // 确保方法不抛出异常
        $exception = null;
        try {
            $this->extension->load([], $this->container);
        } catch (\Throwable $e) {
            $exception = $e;
        }

        $this->assertNull($exception);
    }
}
