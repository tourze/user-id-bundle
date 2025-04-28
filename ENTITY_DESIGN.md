# Entity Design

This module contains the following main entities:

## Identity

- `id` (string): Unique identifier
- `identityType` (string): Type of identity (email, phone, etc.)
- `identityValue` (string): Value of the identity
- `extra` (array): Additional information

### Design Notes

- The `Identity` entity is designed to be flexible, supporting various identity types with extensible extra fields.
- It implements the `Arrayable` interface for easy serialization.

## SystemUser

- Implements `UserInterface` and `Stringable`
- Always returns 'system' as the identifier
- Used as a special admin/system user within the bundle

### Design Notes

- The `SystemUser` is a singleton-like utility entity for representing the system itself as a user.
- It always has the `ROLE_ADMIN` role.

---

All entities are designed for extensibility and integration with Symfony Security and user management systems.
