<?php
require 'app/models/Model.php';
class GamesApiModel extends Model
{

    function getAll()
    {
        $query = $this->db->prepare('SELECT * FROM juego');
        $query->execute();
        $games = $query->fetchAll(PDO::FETCH_OBJ);
        return $games;
    }


    function getGame($id)
    {
        $query = $this->db->prepare('SELECT * FROM JUEGO WHERE id = ?');
        $query->execute([$id]);
        $game = $query->fetch(PDO::FETCH_OBJ);
        return $game;
    }

    function add($data)
    {
        $query = $this->db->prepare("INSERT INTO JUEGO ( nombre, genero, desarrollador_id, año_lanzamiento) VALUES (?,?,?,?)");
        $query->execute([$data->nombre, $data->genero, $data->desarrollador_id, $data->año_lanzamiento]);
    }

    function updateGame($game, $id)
    {

        $query = $this->db->prepare("UPDATE JUEGO SET nombre = ?, genero = ?, desarrollador_id = ?, año_lanzamiento = ? WHERE id = ?");
        $query->execute([$game->nombre, $game->genero, $game->desarrollador_id, $game->año_lanzamiento, $id]);
    }

    function deleteGame($id)
    {
        $query = $this->db->prepare("DELETE FROM JUEGO WHERE id = ?");
        $query->execute([$id]);
    }
}
