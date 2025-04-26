<?php

namespace Tourze\UserIDBundle\Tests\Contracts;

use PHPUnit\Framework\TestCase;
use Symfony\Component\Security\Core\User\UserInterface;
use Tourze\UserIDBundle\Contracts\UserIdentityInterface;

class UserIdentityInterfaceTest extends TestCase
{
    public function test_interfaceMethods_areCorrectlyDefined(): void
    {
        // 使用反射API检查接口定义是否符合预期
        $reflectionClass = new \ReflectionClass(UserIdentityInterface::class);

        $this->assertTrue($reflectionClass->isInterface());

        // 验证接口方法
        $this->assertTrue($reflectionClass->hasMethod('getBelongUser'));
        $this->assertTrue($reflectionClass->hasMethod('getIdentityValue'));
        $this->assertTrue($reflectionClass->hasMethod('getIdentityType'));
        $this->assertTrue($reflectionClass->hasMethod('getIdentityArray'));

        // 验证方法返回类型
        $getBelongUserMethod = $reflectionClass->getMethod('getBelongUser');
        $this->assertTrue(
            $getBelongUserMethod->hasReturnType() &&
            ($getBelongUserMethod->getReturnType()->getName() === 'Symfony\Component\Security\Core\User\UserInterface' ||
                $getBelongUserMethod->getReturnType()->getName() === '?Symfony\Component\Security\Core\User\UserInterface')
        );
    }

    public function test_mockImplementation_canBeCreated(): void
    {
        // 创建接口的模拟实现，确保可以创建
        $mockIdentity = $this->createMock(UserIdentityInterface::class);
        $mockUser = $this->createMock(UserInterface::class);

        $mockIdentity->method('getBelongUser')->willReturn($mockUser);
        $mockIdentity->method('getIdentityValue')->willReturn('test@example.com');
        $mockIdentity->method('getIdentityType')->willReturn('email');
        $mockIdentity->method('getIdentityArray')->willReturn(new \ArrayIterator(['email' => 'test@example.com']));

        $this->assertSame($mockUser, $mockIdentity->getBelongUser());
        $this->assertEquals('test@example.com', $mockIdentity->getIdentityValue());
        $this->assertEquals('email', $mockIdentity->getIdentityType());
        $this->assertInstanceOf(\Traversable::class, $mockIdentity->getIdentityArray());
    }
}
