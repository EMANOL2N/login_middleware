<?php

namespace App\Models;

use CodeIgniter\Model;

class AclModel extends Model
{
    protected $table = 'users'; // Nombre de la tabla
    protected $primaryKey = 'id'; // Llave primaria
    protected $allowedFields = ['username', 'password', 'role_id']; // Columnas permitidas

    // Obtener usuario por un criterio (por ejemplo, username)
    public function obtenerUsuario($criterio)
    {
        return $this->where($criterio)->findAll();
    }

    // Obtener roles de un usuario
    public function getUserRoles($userId)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->select('roles.id as role_id, roles.role_name');
        $builder->join('roles', 'users.role_id = roles.id');
        $builder->where('users.id', $userId);
        return $builder->get()->getResultArray();
    }

    // Obtener permisos asociados a un rol
    public function getRolePermissions($roleId)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('role_permissions');
        $builder->select('permissions.permission_name');
        $builder->join('permissions', 'role_permissions.permission_id = permissions.id');
        $builder->where('role_permissions.role_id', $roleId);
        return $builder->get()->getResultArray();
    }

    // Verificar si un usuario tiene un permiso específico
    public function hasPermission($userId, $permission)
    {
        // Obtener roles del usuario
        $roles = $this->getUserRoles($userId);

        foreach ($roles as $role) {
            // Obtener permisos del rol
            $permissions = $this->getRolePermissions($role['role_id']);
            foreach ($permissions as $perm) {
                if ($perm['permission_name'] === $permission) {
                    return true;
                }
            }
        }

        return false;
    }
}
