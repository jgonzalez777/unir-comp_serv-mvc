<?php
require_once 'model/libro.php';

class LibroController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Libro();
    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/libro/libro.php';
        require_once 'view/footer.php';
    }
    
    public function Crud(){
        $lib = new Libro();
        
        if(isset($_REQUEST['id'])){
            $lib = $this->model->Obtener($_REQUEST['id']);
        }
        
        require_once 'view/header.php';
        require_once 'view/libro/libro-editar.php';
        require_once 'view/footer.php';
    }
    
    public function Guardar(){
        $lib = new Libro();
        $lib->set_id($_REQUEST['id']);
        $lib->set_titulo($_REQUEST['titulo']);
        $lib->set_autor($_REQUEST['autor']);
        $lib->set_anio_publicacion($_REQUEST['anio_publicacion']);
        $lib->set_ciudad($_REQUEST['ciudad']);
        $lib->set_pais($_REQUEST['pais']);
        $lib->set_editorial($_REQUEST['editorial']);
        $lib->set_precio($_REQUEST['precio']);


        $lib->get_id() > 0 
            ? $this->model->Actualizar($lib)
            : $this->model->Registrar($lib);
        
        header('Location: index.php');
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id']);
        header('Location: index.php');
    }
}