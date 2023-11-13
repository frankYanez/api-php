<?php
require_once 'app/models/Model.php';
class DesarrolladoresApiModel extends Model
{

    function getAll()
    {
        $query = $this->db->prepare('SELECT * FROM desarrollador');
        $query->execute();
        $desarrollador = $query->fetchAll(PDO::FETCH_OBJ);
        return $desarrollador;
    }


    function getDesarrollador($id)
    {
        $query = $this->db->prepare('SELECT * FROM desarrollador WHERE id = ?');
        $query->execute([$id]);
        $desarrollador= $query->fetch(PDO::FETCH_OBJ);
        return $desarrollador;
    }

    function add($data)
    {   
        var_dump($data);
        $query = $this->db->prepare("INSERT INTO desarrollador ( nombre, sede, año_fundacion, propietario) VALUES (?,?,?,?)");
        $query->execute([$data->nombre, $data->sede, $data->año_fundacion, $data->propietario]);
    }

    function updateDesarrollador($desarrollador, $id)
    {

        $query = $this->db->prepare("UPDATE desarrollador SET nombre = ?, sede = ?, año_fundacion = ?, propietario = ? WHERE id = ?");
        $query->execute([$desarrollador->nombre, $desarrollador->sede, $desarrollador->año_fundacion, $desarrollador->propietario, $id]);
    }

    function deleteGame($id)
    {
        $query = $this->db->prepare("DELETE FROM desarrollador WHERE id = ?");
        $query->execute([$id]);
    }
}
