<?php

declare(strict_types=1);

namespace Tourze\UserIDBundle\Tests\Contracts;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Security\Core\User\UserInterface;
use Tourze\UserIDBundle\Contracts\IdentityInterface;

/**
 * @internal
 */
#[CoversClass(IdentityInterface::class)]
final class IdentityInterfaceTest extends TestCase
{
    public function testInterfaceMethodsAreCorrectlyDefined(): void
    {
        // 使用反射API检查接口定义是否符合预期
        $reflectionClass = new \ReflectionClass(IdentityInterface::class);

        $this->assertTrue($reflectionClass->isInterface());

        // 验证接口方法
        $this->assertTrue($reflectionClass->hasMethod('getUser'));
        $this->assertTrue($reflectionClass->hasMethod('getAccounts'));
        $this->assertTrue($reflectionClass->hasMethod('getIdentityValue'));
        $this->assertTrue($reflectionClass->hasMethod('getIdentityType'));
        $this->assertTrue($reflectionClass->hasMethod('getIdentityArray'));

        // 验证方法返回类型
        $getUserMethod = $reflectionClass->getMethod('getUser');
        $this->assertTrue($getUserMethod->hasReturnType());

        $returnType = $getUserMethod->getReturnType();
        $this->assertNotNull($returnType);

        if ($returnType instanceof \ReflectionNamedType) {
            $typeName = $returnType->getName();
            $this->assertEquals(UserInterface::class, $typeName);
        }
    }
}
