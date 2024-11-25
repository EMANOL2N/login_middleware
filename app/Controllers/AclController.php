<?php

namespace App\Controllers;

use App\Models\AclModel;

class AclController extends BaseController
{
    protected $aclModel;

    public function __construct()
    {
        $this->aclModel = new AclModel();
    }

    // Verificar permisos en tiempo de ejecución
    public function checkPermission($permission)
    {
        $session = session();
        $userId = $session->get('id');

        if (!$this->aclModel->hasPermission($userId, $permission)) {
            return redirect()->to('/no_permission')->with('error', 'No tienes acceso a esta sección.');
        }

        return true;
    }
}
