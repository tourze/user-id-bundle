<?php

declare(strict_types=1);

namespace Tourze\UserIDBundle;

use Doctrine\Bundle\DoctrineBundle\DoctrineBundle;
use Symfony\Bundle\FrameworkBundle\FrameworkBundle;
use Symfony\Bundle\SecurityBundle\SecurityBundle;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use Tourze\BundleDependency\BundleDependencyInterface;

class UserIDBundle extends Bundle implements BundleDependencyInterface
{
    public static function getBundleDependencies(): array
    {
        return [
            FrameworkBundle::class => ['all' => true],
            DoctrineBundle::class => ['all' => true],
            SecurityBundle::class => ['all' => true],
        ];
    }
}
