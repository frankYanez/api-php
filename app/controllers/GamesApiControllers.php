<?php

require_once 'app/models/GamesApiModel.php';
require_once 'app/views/ApiView.php';
require_once 'app/controllers/ApiController.php';
class GameApiController extends ApiController
{

    private $model;
    private $view;


    public function __construct()
    {
        parent::__construct();
        $this->model = new GamesApiModel();
        $this->view = new ApiView();
    }



    //OBTENGO TODOS LOS JUEGOS
    public function getGames($params = [])
    {
        //ORDENAR LOS JUEGOS
        $order = isset($_GET['order']) ? strtoupper($_GET['order']) : 'ASC'; //ASCENDENTE PREDETERMINADO
        //CAMPO POR EL CUAL SE ORDENAN LOS JUEGOS
        $field = isset($_GET['field']) ? strtolower($_GET['field']) : 'id'; //ID PREDETERMINADO
        //CAMPO POR EL CUAL FILTRO LOS JUEGOS
        $filterBy = isset($_GET['filterBy']) ? strtolower($_GET['filterBy']) : 'null'; //NULL DEFECTO
        //VALOR POR EL CUAL FILTRO LOS JUEGOS             
        $filterValue = isset($_GET['filterValue']) ? ucfirst($_GET['filterValue']) : 'null'; //NULL DEFECTO
        //NUMERO MAXIMO DE RESULTADOS A DEVOLVER
        $limit = isset($_GET['limit']) ? ($_GET['limit']) : 'null'; //NULL DEFECTO
        //NUMERO DE RESULTADOS PARA OMITIR
        $offset = isset($_GET['offset']) ? ($_GET['offset']) : 'null'; //NULL DEFECTO

        $games = $this->model->getAll($order, $field, $filterBy, $filterValue, $limit, $offset);
        $this->view->response($games, 200);
    }


    //OBTENGO UN JUEGO POR ID

    public function getGame($params = [])
    {
        if (empty($params[':ID']))
            $this->view->response("El juego no existe", 404);
        else {
            $id = $params[':ID'];
            $game = $this->model->getGame($id);
            if ($game)
                $this->view->response($game, 200);
            else
                $this->view->response("El juego no existe", 404);
        }
    }

    //AGREGO UN JUEGO

    public function addGame()
    {
        $data = $this->getData();
        $this->model->add($data);
        $this->view->response("El juego ha sido creado", 201);
    }

    //ACTUALIZO UN JUEGO

    public function updateGame($params = [])
    {
        $newBody = $this->getData();
        if (empty($params[':ID'])) {
            $this->view->response("El juego no existe", 404);
        } else {
            $id = $params[':ID'];
            $game = $this->model->getGame($id);
            if ($game) {
                $this->model->updateGame($newBody, $id);
                $this->view->response("El juego ha sido actualizado", 200);
            } else {
                $this->view->response("Faltan completar campos", 400);
            }
        }
    }

    //ELIMINO UN JUEGO
    public function deleteGame($params = [])
    {
        if (empty($params[':ID'])) {
            $this->view->response("El juego no existe", 404);
        } else {
            $id = $params[':ID'];
            $game = $this->model->getGame($id);
            if ($game) {
                $this->model->deleteGame($id);
                $this->view->response("El juego ha sido borrado", 200);
            }
        }
    }
}
