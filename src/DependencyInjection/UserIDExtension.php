<?php

declare(strict_types=1);

namespace Tourze\UserIDBundle\DependencyInjection;

use Tourze\SymfonyDependencyServiceLoader\AutoExtension;

class UserIDExtension extends AutoExtension
{
    protected function getConfigDir(): string
    {
        return __DIR__ . '/../Resources/config';
    }
}
