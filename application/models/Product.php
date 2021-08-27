<?php
class Product extends CI_Model{
    function __construct(){
        $this->load->database();
    }

    public function create($datos){
        if(!$this->db->insert('productos', $datos)){
            return false;
        }
        return true;
    }

    public function delete($datos){
        $this->db->where('idProducto', $datos['idProducto']);
        if(!$this->db->delete('productos')){
            return false;
        }
        return true;
    }

    public function update($datos){
        $this->db->set('nombreProducto', $datos['nombreProducto']);
        $this->db->set('referencia', $datos['referencia']);
        $this->db->set('precio', $datos['precio']);
        $this->db->set('peso', $datos['peso']);
        $this->db->set('categoria', $datos['categoria']);
        $this->db->set('stock', $datos['stock']);
        $this->db->where('idProducto', $datos['idProducto']);
        if(!$this->db->update('productos')){
            return false;
        }
        return true;
    }

    public function show(){
        $query = $this->db->get('productos');
        return $query;
    }
    public function showById($datos){
        $this->db->where('idProducto',$datos['idProducto']);
        $query = $this->db->get('productos');
        return $query;
    }
}