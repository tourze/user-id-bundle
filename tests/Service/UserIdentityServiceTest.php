<?php

namespace Tourze\UserIDBundle\Tests\Service;

use PHPUnit\Framework\TestCase;
use Symfony\Component\Security\Core\User\UserInterface;
use Tourze\UserIDBundle\Service\UserIdentityServiceImpl;

class UserIdentityServiceTest extends TestCase
{
    private UserIdentityServiceImpl $service;

    protected function setUp(): void
    {
        $this->service = new UserIdentityServiceImpl();
    }

    public function test_findByType_withValidParameters_returnsNull(): void
    {
        $result = $this->service->findByType('email', 'test@example.com');
        $this->assertNull($result);
    }

    public function test_findByType_withEmptyType_returnsNull(): void
    {
        $result = $this->service->findByType('', 'test@example.com');
        $this->assertNull($result);
    }

    public function test_findByType_withEmptyValue_returnsNull(): void
    {
        $result = $this->service->findByType('email', '');
        $this->assertNull($result);
    }

    public function test_findByUser_withValidUser_returnsEmptyIterable(): void
    {
        $user = $this->createMock(UserInterface::class);
        $result = $this->service->findByUser($user);

        $this->assertInstanceOf(\ArrayIterator::class, $result);
        $this->assertCount(0, $result);
    }
}

