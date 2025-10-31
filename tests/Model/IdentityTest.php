<?php

declare(strict_types=1);

namespace Tourze\UserIDBundle\Tests\Model;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use Tourze\UserIDBundle\Model\Identity;

/**
 * @internal
 */
#[CoversClass(Identity::class)]
final class IdentityTest extends TestCase
{
    public function testConstructWithValidParametersSetsProperties(): void
    {
        $id = '123';
        $type = 'email';
        $value = 'test@example.com';
        $extra = ['verified' => true];

        $identity = new Identity($id, $type, $value, $extra);

        $this->assertEquals($id, $identity->getId());
        $this->assertEquals($type, $identity->getIdentityType());
        $this->assertEquals($value, $identity->getIdentityValue());
        $this->assertEquals($extra, $identity->getExtra());
    }

    public function testGetIdReturnsCorrectId(): void
    {
        $identity = new Identity('123', 'email', 'test@example.com');
        $this->assertEquals('123', $identity->getId());
    }

    public function testGetIdentityValueReturnsCorrectValue(): void
    {
        $identity = new Identity('123', 'email', 'test@example.com');
        $this->assertEquals('test@example.com', $identity->getIdentityValue());
    }

    public function testGetIdentityTypeReturnsCorrectType(): void
    {
        $identity = new Identity('123', 'email', 'test@example.com');
        $this->assertEquals('email', $identity->getIdentityType());
    }

    public function testGetExtraReturnsCorrectExtraData(): void
    {
        $extra = ['verified' => true, 'createTime' => '2023-01-01'];
        $identity = new Identity('123', 'email', 'test@example.com', $extra);

        $this->assertEquals($extra, $identity->getExtra());
    }

    public function testGetExtraWithEmptyExtraDataReturnsEmptyArray(): void
    {
        $identity = new Identity('123', 'email', 'test@example.com');
        $this->assertEquals([], $identity->getExtra());
    }

    public function testToArrayReturnsCorrectStructure(): void
    {
        $identity = new Identity('123', 'email', 'test@example.com');

        $expected = [
            'id' => '123',
            'identityType' => 'email',
            'identityValue' => 'test@example.com',
        ];

        $this->assertEquals($expected, $identity->toArray());
    }

    public function testToArrayWithExtraDataIncludesExtraDataInResult(): void
    {
        $extra = ['verified' => true, 'createTime' => '2023-01-01'];
        $identity = new Identity('123', 'email', 'test@example.com', $extra);

        $expected = [
            'id' => '123',
            'identityType' => 'email',
            'identityValue' => 'test@example.com',
            'verified' => true,
            'createTime' => '2023-01-01',
        ];

        $this->assertEquals($expected, $identity->toArray());
    }
}
