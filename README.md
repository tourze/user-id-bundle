# UserID Bundle

[![License: MIT](https://img.shields.io/badge/license-MIT-blue.svg)](LICENSE)

A Symfony bundle for managing user identities, supporting multiple identity types (such as email, phone number, etc.), integrated with Symfony Security, and providing a general-purpose identity lookup and management service.

## Features

- Support for multiple identity types (email, phone number, etc.)
- Integration with Symfony Security
- General-purpose identity lookup service
- Flexible extension for custom identity types

## Installation

- Requires PHP 8.1+
- Requires Symfony 6.4+ components
- Install via Composer:

```bash
composer require tourze/user-id-bundle
```

## Quick Start

1. Register the bundle in `config/bundles.php`:

```php
return [
    // ...
    Tourze\UserIDBundle\UserIDBundle::class => ['all' => true],
];
```

2. Create an entity implementing `UserIdentityInterface`.
3. Use `UserIdentityService` to manage and lookup user identities.

## Documentation

- Main Interfaces: `UserIdentityInterface`, `UserIdentityService`
- Main Models: `Identity`, `SystemUser`
- Service Implementation: `UserIdentityServiceImpl`

## Contributing

- Issues and PRs are welcome
- Follow PSR coding standards
- Use PHPUnit for testing

## License

- License: MIT
- Author: tourze Team

## Changelog

See the project changelog or Git commit history for details.
