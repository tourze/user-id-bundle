# 数据库实体设计

本模块包含以下主要实体：

## Identity

- `id`（字符串）：唯一标识符
- `identityType`（字符串）：身份类型（如邮箱、手机号等）
- `identityValue`（字符串）：身份值
- `extra`（数组）：额外信息

### 设计说明

- `Identity` 实体设计灵活，支持多种身份类型，并可通过 `extra` 字段扩展。
- 实现了 `Arrayable` 接口，便于序列化。

## SystemUser

- 实现 `UserInterface` 和 `Stringable`
- 始终返回 'system' 作为标识符
- 用于代表系统自身的特殊管理员用户

### 设计说明

- `SystemUser` 是一个类单例的工具型实体，用于标识系统操作。
- 默认拥有 `ROLE_ADMIN` 权限。

---

所有实体均为可扩展设计，便于与 Symfony Security 及用户管理系统集成。
