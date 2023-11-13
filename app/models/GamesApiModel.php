<?php
require_once 'app/models/Model.php';
class GamesApiModel extends Model
{

    function getAll($order, $field, $filterBy, $filterValue, $limit, $offset)
    {
        $query = "SELECT * FROM juego";

        switch($filterBy){
            case 'nombre':
                $query .= ' WHERE nombre = \'' . $filterValue . '\'';
                break;
            case 'genero':
                $query .= ' WHERE genero = \'' . $filterValue . '\'';
                break;
            case 'desarrollador_id':
                $query .= ' WHERE desarrollador_id = \'' . $filterValue . '\'';
                break;
            case 'año_lanzamiento':
                $query .= ' WHERE año_lanzamiento = \'' . $filterValue . '\'';
                break;
            default:
            $query .= ' ';
                break;
        }
        switch($order){
            case 'ASC':
                $query .= ' ORDER BY ' . $field . ' ASC';
                break;
            case 'DESC':
                $query .= ' ORDER BY ' . $field . ' DESC';
                break;
            default:
                $query .= ' ORDER BY alias ASC';
                break;
        }
        if($limit !== 'null'){
            $query .= ' LIMIT ' . $limit;
        }

        if($offset !== 'null'){
            $query .= ' OFFSET ' . $offset;
        }

        $query1 = $this->db->prepare($query);
        $query1->execute();
        return $query1->fetchAll(PDO::FETCH_OBJ);

        
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
        var_dump($data);
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


