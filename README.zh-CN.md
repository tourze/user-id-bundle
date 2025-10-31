# 用户身份模块（UserID Bundle）

[English](README.md) | [中文](README.zh-CN.md)

[![Latest Version](https://img.shields.io/packagist/v/tourze/user-id-bundle.svg?style=flat-square)](https://packagist.org/packages/tourze/user-id-bundle)
[![License: MIT](https://img.shields.io/badge/license-MIT-blue.svg)](LICENSE)
[![PHP Version](https://img.shields.io/packagist/php-v/tourze/user-id-bundle.svg?style=flat-square)](https://packagist.org/packages/tourze/user-id-bundle)
[![Code Coverage](https://img.shields.io/badge/coverage-100%25-brightgreen.svg?style=flat-square)](#测试)

这是一个用于管理用户身份的 Symfony Bundle，支持多种身份类型（如邮箱、手机号等），并与 Symfony Security 集成，提供通用的身份查找与管理服务。

## 功能特性

- 🔐 支持多种身份类型（邮箱、手机号等）
- 🛡️ 与 Symfony Security 集成
- 🔍 提供通用的身份查找服务
- 🔧 灵活扩展自定义身份类型
- 📦 兼容 Symfony 6.4+
- 💾 支持数组化模型便于序列化

## 安装说明

**系统要求：**
- PHP 8.1+
- Symfony 6.4+ 相关组件

**通过 Composer 安装：**

```bash
composer require tourze/user-id-bundle
```

## 快速开始

### 1. 注册 Bundle

在 `config/bundles.php` 中添加 Bundle：

```php
return [
    // ...
    Tourze\UserIDBundle\UserIDBundle::class => ['all' => true],
];
```

### 2. 基本使用

```php
<?php

use Tourze\UserIDBundle\Service\UserIdentityService;
use Tourze\UserIDBundle\Model\Identity;
use Tourze\UserIDBundle\Model\SystemUser;

// 注入服务
public function __construct(
    private UserIdentityService $identityService
) {}

// 根据类型和值查找身份
$identity = $this->identityService->findByType('email', 'user@example.com');

// 根据用户查找身份
$user = new SystemUser();
$identities = $this->identityService->findByUser($user);

// 创建身份模型
$identity = new Identity(
    id: 'unique-id',
    identityType: 'email',
    identityValue: 'user@example.com',
    extra: ['verified' => true]
);

// 转换为数组
$identityArray = $identity->toArray();
```

### 3. 系统用户

Bundle 提供 `SystemUser` 类用于系统级操作：

```php
<?php

use Tourze\UserIDBundle\Model\SystemUser;

// 获取系统用户实例
$systemUser = SystemUser::instance();

// 系统用户默认具有 ROLE_ADMIN 角色
$roles = $systemUser->getRoles(); // ['ROLE_ADMIN']
$identifier = $systemUser->getUserIdentifier(); // 'system'
```

## API 文档

### 核心接口

- **`IdentityInterface`**: 定义用户身份实体的契约
- **`UserIdentityService`**: 身份查找操作的服务接口

### 模型

- **`Identity`**: 表示用户身份的不可变值对象
- **`SystemUser`**: 具有管理员权限的特殊系统用户实现

### 服务

- **`UserIdentityServiceImpl`**: `UserIdentityService` 的默认实现

## 高级用法

### 自定义身份类型

通过实现 `IdentityInterface` 来扩展 Bundle 支持自定义身份类型：

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
    
    // 实现其他必需的方法...
}
```

### 服务扩展

覆盖默认的服务实现：

```yaml
# config/services.yaml
services:
  Tourze\UserIDBundle\Service\UserIdentityService:
    class: App\Service\MyCustomUserIdentityService
```

## 测试

运行测试套件：

```bash
./vendor/bin/phpunit packages/user-id-bundle/tests
```

## 贡献指南

1. Fork 仓库
2. 创建功能分支 (`git checkout -b feature/new-feature`)
3. 进行修改
4. 运行测试 (`./vendor/bin/phpunit`)
5. 提交 Pull Request

请遵循 PSR 编码标准并确保所有测试通过。

## 版权和许可

MIT 许可证。详情请参阅 [许可证文件](LICENSE)。

## 更新日志

详见项目 Changelog 或 Git 提交历史。
