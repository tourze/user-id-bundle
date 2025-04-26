# UserID Bundle

这是一个用于管理用户身份的Symfony Bundle。通过该Bundle，可以管理用户的多种身份类型，例如邮箱、手机号等。

## 安装

```bash
composer require tourze/user-id-bundle
```

## 基本使用

1. 在`config/bundles.php`中注册Bundle：

```php
return [
    // ...
    Tourze\UserIDBundle\UserIDBundle::class => ['all' => true],
];
```

2. 创建实现`UserIdentityInterface`的实体类

3. 使用`UserIdentityService`来查找和管理用户身份

## 运行测试

```bash
./vendor/bin/phpunit packages/user-id-bundle/tests
```

## 功能列表

- 支持多种身份类型（邮箱、手机号等）
- 与Symfony Security集成
- 提供通用的身份查找服务
