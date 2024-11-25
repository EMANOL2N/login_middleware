<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AclMiddleware implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();
        $userId = $session->get('id');
        $permission = $arguments[0]; // Permiso necesario para la ruta

        $aclModel = new \App\Models\AclModel();
        if (!$aclModel->hasPermission($userId, $permission)) {
            return redirect()->to('/no_permission')->with('error', 'No tienes acceso a esta sección.');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // No se necesita realizar acciones después de la ejecución
    }
}
