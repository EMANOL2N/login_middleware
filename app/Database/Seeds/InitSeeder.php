<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class InitSeeder extends Seeder
{
    public function run()
    {
        // Roles
        $this->db->table('roles')->insertBatch([
            ['role_name' => 'admin'],
            ['role_name' => 'user']
        ]);

        // Usuarios
        $this->db->table('users')->insertBatch([
            [
                'username' => 'admin',
                'password' => password_hash('admin123', PASSWORD_DEFAULT),
                'role_id'  => 1 // admin
            ],
            [
                'username' => 'user',
                'password' => password_hash('user123', PASSWORD_DEFAULT),
                'role_id'  => 2 // user
            ]
        ]);

        // Permisos
        $this->db->table('permissions')->insertBatch([
            ['permission_name' => 'admin_access'],
            ['permission_name' => 'user_access']
        ]);

        // Permisos para roles
        $this->db->table('role_permissions')->insertBatch([
            ['role_id' => 1, 'permission_id' => 1], // admin -> admin_access
            ['role_id' => 2, 'permission_id' => 2]  // user -> user_access
        ]);

        // Insertar labs (solo si aún no están en la base de datos)
        $this->db->table('labs')->insertBatch([
            ['id' => 1, 'name' => 'LAB01'],
            ['id' => 2, 'name' => 'LAB02']
        ]);

        // Reservas de ejemplo
        $this->db->table('reservations')->insertBatch([
            [
                'user_id' => 1,  // admin
                'lab_id'  => 1,  // Ejemplo: LAB1
                'start_time' => '2025-07-09 10:00:00',
                'end_time'   => '2025-07-09 12:00:00',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ]);
    }
}
