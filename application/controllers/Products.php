<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper(array('getmenu'));
        $this->load->model('Product');
    }

    public function index(){
        $data['menu'] = main_menu();
        $this->load->view('products', $data);
    }

    public function create(){
        $nombre_producto = $this->input->post('nombreProducto');
        $referencia =  $this->input->post('referencia');
        $precio =  $this->input->post('precio');
        $peso =  $this->input->post('peso');
        $categoria = $this->input->post('categoria');
        $stock =  $this->input->post('stock');

        $datos = array(
            'nombreProducto' => $nombre_producto,
            'referencia' => $referencia,
            'precio' => $precio,
            'peso' => $peso,
            'categoria' => $categoria,
            'stock' => $stock,
        );
        $data['menu'] = main_menu();
        if(!$this->Product->create($datos)){
            $data['msg'] = "Error al insertar el producto";
            $this->load->view('products', $data);
        };
        $data['msg'] = "Producto Registrado";
        $this->load->view('products', $data);
    }

    public function update(){
        $id_producto = $this->input->post('idProducto');
        $nombre_producto = $this->input->post('nombreProducto');
        $referencia =  $this->input->post('referencia');
        $precio =  $this->input->post('precio');
        $peso =  $this->input->post('peso');
        $categoria = $this->input->post('categoria');
        $stock =  $this->input->post('stock');

        $datos = array(
            'idProducto' => $id_producto,
            'nombreProducto' => $nombre_producto,
            'referencia' => $referencia,
            'precio' => $precio,
            'peso' => $peso,
            'categoria' => $categoria,
            'stock' => $stock,
        );
        $data['menu'] = main_menu();
        if(!$this->Product->update($datos)){
            $data['msg'] = "Error al actualizar el producto";
            $this->load->view('products', $data);
        };
        $data['msg'] = "Producto actualizado";
        $this->show();
    }


    public function delete(){
        $id_producto = $this->input->post('idProducto');

        $datos = array(
            'idProducto' => $id_producto,
        );
        $data['menu'] = main_menu();
        $query = $this->Product->delete($datos);
        if(!$query){
            $data['msg'] = "Error al eliminar el producto";
            $this->load->view('products', $data);
        };
        $this->show();
    }

    public function show(){
        $data['menu'] = main_menu();
        $query = $this->Product->show();
        $data['result'] = $query->result();
        $data['msgGet'] = "Productos encontrados";
        $this->load->view('products', $data);
    }
    public function showById(){
        $id_producto = $this->input->post('idProducto');

        $datos = array(
            'idProducto' => $id_producto,
        );
        $data['menu'] = main_menu();
        $query = $this->Product->showById($datos);
        $data['showById'] = $query->result();
        $data['msgGet'] = "Productos encontrados";
        $this->load->view('products', $data);
    }
}