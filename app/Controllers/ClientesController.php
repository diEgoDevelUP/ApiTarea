<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class ClientesController extends ResourceController
{

    protected $modelName = "App\Models\ClientesModel";
    protected $format = "json";

    /** 
    *   @return ResponseInterface
    */

    public function index()
    {
        $cliente = $this->model->findAll();
        return $this->respond($cliente);
    }

    /** 
    *    @param int|string|null $id

    *    @return ResponseInterface
    */

    public function show($id = null)
    {
        $cliente = $this->model->find($id);

        if($cliente){
            return $this->respond($cliente);
        }

        return $this->failNotFound('Cliente no encontrado');
    }
    /** 
    *    @return ResponseInterface
    */

    public function create()
    {
        $data = $this->request->getJSON(true);
        if($this->model->insert($data)){
            return $this->respondCreated($data, 'Cliente creado');
        }

        return $this->failValidationErrors($this->model->errors());
    }

    /** 
    *    @param int|string|null $id

    *    @return ResponseInterface
    */

    public function update($id = null)
    {
        $cliente = $this->model->find($id);

        if(!$cliente){
            return $this->failNotFound('Cliente no encontrado');
        }

        $data = $this->request->getJSON(true);

        if($this->model->update($id, $data)){
            return $this->respondUpdated($data, 'Cliente actualizado');
        }

        return $this->fail('No se pudo actualizar el cliente');
    }

    /** 
    *    @param int|string|null $id

    *    @return ResponseInterface
    */

    public function delete($id = null)
    {
        $cliente = $this->model->find($id);

        if($cliente){
            $this->model->delete($id);
            return $this->respondDeleted($cliente, 'Cliente eliminado');
        }

        return $this->failNotFound('Cliente no encontrado');
    }
}