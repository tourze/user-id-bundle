<?php

declare(strict_types=1);

namespace Tourze\UserIDBundle\Tests\Service;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use Tourze\UserIDBundle\Service\UserIdentityService;

/**
 * @internal
 */
#[CoversClass(UserIdentityService::class)]
final class UserIdentityServiceTest extends TestCase
{
    public function testInterfaceHasCorrectMethods(): void
    {
        $reflectionClass = new \ReflectionClass(UserIdentityService::class);

        $this->assertTrue($reflectionClass->isInterface());

        // 验证接口方法
        $this->assertTrue($reflectionClass->hasMethod('findByType'));
        $this->assertTrue($reflectionClass->hasMethod('findByUser'));

        // 验证方法签名
        $findByTypeMethod = $reflectionClass->getMethod('findByType');
        $this->assertEquals(2, $findByTypeMethod->getNumberOfParameters());

        $findByUserMethod = $reflectionClass->getMethod('findByUser');
        $this->assertEquals(1, $findByUserMethod->getNumberOfParameters());
    }

    public function testFindByTypeMethodHasCorrectReturnType(): void
    {
        $reflectionClass = new \ReflectionClass(UserIdentityService::class);
        $findByTypeMethod = $reflectionClass->getMethod('findByType');

        $this->assertTrue($findByTypeMethod->hasReturnType());
        $returnType = $findByTypeMethod->getReturnType();
        $this->assertNotNull($returnType);

        if ($returnType instanceof \ReflectionNamedType) {
            $this->assertEquals('Tourze\UserIDBundle\Contracts\IdentityInterface', $returnType->getName());
            $this->assertTrue($returnType->allowsNull());
        }
    }

    public function testFindByUserMethodHasCorrectReturnType(): void
    {
        $reflectionClass = new \ReflectionClass(UserIdentityService::class);
        $findByUserMethod = $reflectionClass->getMethod('findByUser');

        $this->assertTrue($findByUserMethod->hasReturnType());
        $returnType = $findByUserMethod->getReturnType();
        $this->assertNotNull($returnType);

        if ($returnType instanceof \ReflectionNamedType) {
            $this->assertEquals('iterable', $returnType->getName());
        }
    }
}
