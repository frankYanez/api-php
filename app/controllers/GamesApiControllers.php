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

        $games = $this->model->getAll();
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
            }
            else {
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
