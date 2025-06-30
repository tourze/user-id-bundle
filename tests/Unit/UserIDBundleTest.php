<?php

namespace Tourze\UserIDBundle\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Tourze\UserIDBundle\UserIDBundle;

class UserIDBundleTest extends TestCase
{
    public function test_instantiation_createsValidBundle(): void
    {
        $bundle = new UserIDBundle();
        
        $this->assertInstanceOf(UserIDBundle::class, $bundle);
    }
    
    public function test_getPath_returnsCorrectPath(): void
    {
        $bundle = new UserIDBundle();
        $expectedPath = dirname(__DIR__, 2) . '/src';
        
        $this->assertEquals($expectedPath, $bundle->getPath());
    }
}