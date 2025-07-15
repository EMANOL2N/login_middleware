<?php

namespace App\Models;

use CodeIgniter\Model;

class ReservationsModel extends Model
{
    protected $table      = 'reservations';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'lab_id', 'start_time', 'end_time'];
    // Función para obtener las reservas de un laboratorio para una semana determinada
    public function getReservationsForWeek($labId, $startWeek, $endWeek)
    {
        return $this->where('lab_id', $labId)
                    ->where('start_time >=', $startWeek)
                    ->where('end_time <=', $endWeek)
                    ->findAll(); // Devuelve todas las reservas
    }

    // Función para verificar si hay solapamientos en las reservas
    public function checkForOverlap($labId, $startTime, $endTime)
    {
        return $this->where('lab_id', $labId)
                    ->where('start_time <', $endTime)
                    ->where('end_time >', $startTime)
                    ->countAllResults() > 0;  // Verifica si hay alguna reserva en el rango de tiempo
    }

    // Función para insertar una nueva reserva
    public function insertReservation($data)
    {
        return $this->insert($data);
    }
}
