<?php

namespace Tourze\UserIDBundle\Tests\Contracts;

use PHPUnit\Framework\TestCase;
use Symfony\Component\Security\Core\User\UserInterface;
use Tourze\UserIDBundle\Contracts\IdentityInterface;

class IdentityInterfaceTest extends TestCase
{
    public function test_interfaceMethods_areCorrectlyDefined(): void
    {
        // 使用反射API检查接口定义是否符合预期
        $reflectionClass = new \ReflectionClass(IdentityInterface::class);

        $this->assertTrue($reflectionClass->isInterface());

        // 验证接口方法
        $this->assertTrue($reflectionClass->hasMethod('getUser'));
        $this->assertTrue($reflectionClass->hasMethod('getIdentityValue'));
        $this->assertTrue($reflectionClass->hasMethod('getIdentityType'));
        $this->assertTrue($reflectionClass->hasMethod('getIdentityArray'));

        // 验证方法返回类型
        $getUserMethod = $reflectionClass->getMethod('getUser');
        $this->assertTrue(
            $getUserMethod->hasReturnType() &&
            ($getUserMethod->getReturnType()->getName() === 'Symfony\Component\Security\Core\User\UserInterface' ||
                $getUserMethod->getReturnType()->getName() === '?Symfony\Component\Security\Core\User\UserInterface')
        );
    }

    public function test_mockImplementation_canBeCreated(): void
    {
        // 创建接口的模拟实现，确保可以创建
        $mockIdentity = $this->createMock(IdentityInterface::class);
        $mockUser = $this->createMock(UserInterface::class);

        $mockIdentity->method('getUser')->willReturn($mockUser);
        $mockIdentity->method('getIdentityValue')->willReturn('test@example.com');
        $mockIdentity->method('getIdentityType')->willReturn('email');
        $mockIdentity->method('getIdentityArray')->willReturn(new \ArrayIterator(['email' => 'test@example.com']));

        $this->assertSame($mockUser, $mockIdentity->getUser());
        $this->assertEquals('test@example.com', $mockIdentity->getIdentityValue());
        $this->assertEquals('email', $mockIdentity->getIdentityType());
        $this->assertInstanceOf(\Traversable::class, $mockIdentity->getIdentityArray());
    }
}
