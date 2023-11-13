<?php

require_once 'app/models/DesarrolladoresApiModel.php';
require_once 'app/views/ApiView.php';
require_once 'app/controllers/ApiController.php';
class DesarrolladoresApiController extends ApiController
{

    private $model;
    private $view;

    public function __construct()
    {
        parent::__construct();
        $this->model = new DesarrolladoresApiModel();
        $this->view = new ApiView();
    }

        //OBTENGO TODOS LOS DESARROLLADORES
    public function getDesarrolladores($params = [])
    {
    
        $desarrolladores = $this->model->getAll();
        $this->view->response($desarrolladores, 200);
    }

    //OBTENGO UN DESARROLLADOR POR ID

    public function getDesarrollador($params = [])
    {
        if (empty($params[':ID']))
            $this->view->response("El juego no existe", 404);
        else {
            $id = $params[':ID'];
            $desarrolladores = $this->model->getDesarrollador($id);
            if ($desarrolladores)
                $this->view->response($desarrolladores, 200);
            else
                $this->view->response("El juego no existe", 404);
        }
    }

    //AGREGO UN DESARROLLADOR

    public function addDesarrollador()
    {
        $data = $this->getData();
        $this->model->add($data);
        $this->view->response("El Desarrollador ha sido creado", 201);
    }

    //ACTUALIZO UN DESARROLLADOR

    public function updateDesarrollador($params = [])
    {
        $newBody = $this->getData();
        if (empty($params[':ID'])) {
            $this->view->response("El juego no existe", 404);
        } else {
            $id = $params[':ID'];
            $desarrollador = $this->model->getDesarrollador($id);
            if ($desarrollador) {
                $this->model->updateDesarrollador($newBody, $id);
                $this->view->response("El desarrollador ha sido actualizado", 200);
            }
            else {
                $this->view->response("Faltan completar campos", 400);


            }
        }
    }








}