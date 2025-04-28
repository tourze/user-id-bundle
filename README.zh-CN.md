# 用户身份模块（UserID Bundle）

这是一个用于管理用户身份的 Symfony Bundle，支持多种身份类型（如邮箱、手机号等），并与 Symfony Security 集成，提供通用的身份查找与管理服务。

## 功能特性

- 支持多种身份类型（邮箱、手机号等）
- 与 Symfony Security 集成
- 提供通用的身份查找服务
- 灵活扩展身份类型

## 安装说明

- 依赖 PHP 8.1 及以上
- 依赖 Symfony 6.4 及以上相关组件
- 使用 Composer 安装：

```bash
composer require tourze/user-id-bundle
```

## 快速开始

1. 在 `config/bundles.php` 中注册 Bundle：

```php
return [
    // ...
    Tourze\UserIDBundle\UserIDBundle::class => ['all' => true],
];
```

2. 创建实现 `UserIdentityInterface` 的实体类
3. 使用 `UserIdentityService` 查找和管理用户身份

## 详细文档

- 主要接口：`UserIdentityInterface`、`UserIdentityService`
- 主要模型：`Identity`、`SystemUser`
- 服务实现：`UserIdentityServiceImpl`

## 贡献指南

- 欢迎提交 Issue 和 PR
- 遵循 PSR 规范及项目代码风格
- 测试请使用 PHPUnit

## 版权和许可

- 协议：MIT
- 作者：tourze 团队

## 更新日志

详见项目 Changelog 或 Git 提交历史。
