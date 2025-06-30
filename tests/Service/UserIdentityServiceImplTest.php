<?php

namespace Tourze\UserIDBundle\Tests\Service;

use PHPUnit\Framework\TestCase;
use Symfony\Component\Security\Core\User\UserInterface;
use Tourze\UserIDBundle\Service\UserIdentityServiceImpl;

class UserIdentityServiceImplTest extends TestCase
{
    private UserIdentityServiceImpl $service;

    protected function setUp(): void
    {
        $this->service = new UserIdentityServiceImpl();
    }

    public function test_findByType_returnsNull(): void
    {
        $result = $this->service->findByType('email', 'test@example.com');
        $this->assertNull($result);
    }

    public function test_findByUser_returnsEmptyIterator(): void
    {
        $user = $this->createMock(UserInterface::class);
        $result = $this->service->findByUser($user);
        
        $this->assertInstanceOf(\Traversable::class, $result);
        $this->assertCount(0, iterator_to_array($result));
    }
}