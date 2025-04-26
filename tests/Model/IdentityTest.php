<?php

namespace Tourze\UserIDBundle\Tests\Model;

use PHPUnit\Framework\TestCase;
use Tourze\UserIDBundle\Model\Identity;

class IdentityTest extends TestCase
{
    public function test_construct_withValidParameters_setsProperties(): void
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

    public function test_getId_returnsCorrectId(): void
    {
        $identity = new Identity('123', 'email', 'test@example.com');
        $this->assertEquals('123', $identity->getId());
    }

    public function test_getIdentityValue_returnsCorrectValue(): void
    {
        $identity = new Identity('123', 'email', 'test@example.com');
        $this->assertEquals('test@example.com', $identity->getIdentityValue());
    }

    public function test_getIdentityType_returnsCorrectType(): void
    {
        $identity = new Identity('123', 'email', 'test@example.com');
        $this->assertEquals('email', $identity->getIdentityType());
    }

    public function test_getExtra_returnsCorrectExtraData(): void
    {
        $extra = ['verified' => true, 'createdAt' => '2023-01-01'];
        $identity = new Identity('123', 'email', 'test@example.com', $extra);

        $this->assertEquals($extra, $identity->getExtra());
    }

    public function test_getExtra_withEmptyExtraData_returnsEmptyArray(): void
    {
        $identity = new Identity('123', 'email', 'test@example.com');
        $this->assertEquals([], $identity->getExtra());
    }

    public function test_toArray_returnsCorrectStructure(): void
    {
        $identity = new Identity('123', 'email', 'test@example.com');

        $expected = [
            'id' => '123',
            'identityType' => 'email',
            'identityValue' => 'test@example.com',
        ];

        $this->assertEquals($expected, $identity->toArray());
    }

    public function test_toArray_withExtraData_includesExtraDataInResult(): void
    {
        $extra = ['verified' => true, 'createdAt' => '2023-01-01'];
        $identity = new Identity('123', 'email', 'test@example.com', $extra);

        $expected = [
            'id' => '123',
            'identityType' => 'email',
            'identityValue' => 'test@example.com',
            'verified' => true,
            'createdAt' => '2023-01-01',
        ];

        $this->assertEquals($expected, $identity->toArray());
    }
}
