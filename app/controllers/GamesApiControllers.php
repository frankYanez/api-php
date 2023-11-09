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

    public function getGames($params = [])
    {
        $games = $this->model->getAll();
        $this->view->response($games, 200);
    }

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

    public function addGame()
    {
        $data = $this->getData();
        $this->model->add($data);
        $this->view->response("El juego ha sido creado", 201);
    }

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
        }
    }

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
