<?php

declare(strict_types=1);

namespace Tourze\UserIDBundle\Tests;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\RunTestsInSeparateProcesses;
use Tourze\PHPUnitSymfonyKernelTest\AbstractBundleTestCase;
use Tourze\UserIDBundle\UserIDBundle;

/**
 * @internal
 */
#[CoversClass(UserIDBundle::class)]
#[RunTestsInSeparateProcesses]
final class UserIDBundleTest extends AbstractBundleTestCase
{
}
