<?php

namespace App\Models;

use CodeIgniter\Model;

class ClientesModel extends Model
{
    protected $table = 'clientes';
    protected $primaryKey = 'id_cliente';

    protected $allowedFields = ['id_cliente', 'nombre', 'direccion', 'telefono', 'correo', 'fecha_registro', 'id_clasificacion_cliente', 'nit'];

}