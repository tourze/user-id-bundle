# UserID Bundle

[English](README.md) | [中文](README.zh-CN.md)

[![Latest Version](https://img.shields.io/packagist/v/tourze/user-id-bundle.svg?style=flat-square)](https://packagist.org/packages/tourze/user-id-bundle)
[![License: MIT](https://img.shields.io/badge/license-MIT-blue.svg)](LICENSE)
[![PHP Version](https://img.shields.io/packagist/php-v/tourze/user-id-bundle.svg?style=flat-square)](https://packagist.org/packages/tourze/user-id-bundle)
[![Code Coverage](https://img.shields.io/badge/coverage-100%25-brightgreen.svg?style=flat-square)](#testing)

A Symfony bundle for managing user identities, supporting multiple identity types (such as email, phone number, etc.), integrated with Symfony Security, and providing a general-purpose identity lookup and management service.

## Features

- 🔐 Support for multiple identity types (email, phone number, etc.)
- 🛡️ Integration with Symfony Security
- 🔍 General-purpose identity lookup service
- 🔧 Flexible extension for custom identity types
- 📦 Symfony 6.4+ compatible
- 💾 Arrayable models for easy serialization

## Installation

**Requirements:**
- PHP 8.1+
- Symfony 6.4+ components

**Install via Composer:**

```bash
composer require tourze/user-id-bundle
```

## Quick Start

### 1. Register the Bundle

Add the bundle to your `config/bundles.php`:

```php
return [
    // ...
    Tourze\UserIDBundle\UserIDBundle::class => ['all' => true],
];
```

### 2. Basic Usage

```php
<?php

use Tourze\UserIDBundle\Service\UserIdentityService;
use Tourze\UserIDBundle\Model\Identity;
use Tourze\UserIDBundle\Model\SystemUser;

// Inject the service
public function __construct(
    private UserIdentityService $identityService
) {}

// Find identity by type and value
$identity = $this->identityService->findByType('email', 'user@example.com');

// Find identities by user
$user = new SystemUser();
$identities = $this->identityService->findByUser($user);

// Create identity model
$identity = new Identity(
    id: 'unique-id',
    identityType: 'email',
    identityValue: 'user@example.com',
    extra: ['verified' => true]
);

// Convert to array
$identityArray = $identity->toArray();
```

### 3. System User

The bundle provides a `SystemUser` class for system-level operations:

```php
<?php

use Tourze\UserIDBundle\Model\SystemUser;

// Get system user instance
$systemUser = SystemUser::instance();

// System user has ROLE_ADMIN by default
$roles = $systemUser->getRoles(); // ['ROLE_ADMIN']
$identifier = $systemUser->getUserIdentifier(); // 'system'
```

## API Documentation

### Core Interfaces

- **`IdentityInterface`**: Defines the contract for user identity entities
- **`UserIdentityService`**: Service interface for identity lookup operations

### Models

- **`Identity`**: Immutable value object representing a user identity
- **`SystemUser`**: Special system user implementation with admin privileges

### Services

- **`UserIdentityServiceImpl`**: Default implementation of `UserIdentityService`

## Advanced Usage

### Custom Identity Types

Extend the bundle to support custom identity types by implementing `IdentityInterface`:

```php
<?php

use Tourze\UserIDBundle\Contracts\IdentityInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class CustomIdentity implements IdentityInterface
{
    public function getIdentityType(): string
    {
        return 'custom';
    }
    
    // Implement other required methods...
}
```

### Service Extension

Override the default service implementation:

```yaml
# config/services.yaml
services:
  Tourze\UserIDBundle\Service\UserIdentityService:
    class: App\Service\MyCustomUserIdentityService
```

## Testing

Run the test suite:

```bash
./vendor/bin/phpunit packages/user-id-bundle/tests
```

## Contributing

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/new-feature`)
3. Make your changes
4. Run tests (`./vendor/bin/phpunit`)
5. Submit a Pull Request

Please follow PSR coding standards and ensure all tests pass.

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.

## Changelog

See the project changelog or Git commit history for details.
