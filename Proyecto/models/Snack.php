<?php

class Snack{

    private $_id;
    private $_name;
    private $_imagen;
    private $_costo;
    private $_active;

    public function __construct($id, $name, $imagen, $costo, $active){
        $this->setId($id);
        $this->setName($name);
        $this->setImagen($imagen);
        $this->setCosto($costo);
        $this->setActive($active);
    }

    public function getId() {
        return $this->_id;
    }

    public function setId($id) {
        $this->_id = $id;
    }

    public function getName() {
        return $this->_name;
    }

    public function setName($name) {
        $this->_name = $name;
    }     

    public function getImagen() {
        return $this->_imagen;
    }

    public function setImagen($imagen) {
        $this->_imagen = base64_encode($imagen);
    } 

    public function getCosto() {
        return $this->_costo;
    }

    public function setCosto($costo) {
        $this->_costo = $costo;
    }   

    public function getActive() {
        return $this->_active;
    }

    public function setActive($active) {
        $this->_active = $active;
    } 

    public function getArray() {
        $array = array();

        $array["id"] = $this->getId();
        $array["name"] = $this->getName();
        $array["imagen"] = $this->getImagen();
        $array["costo"] = $this->getCosto();
        $array["active"] = $this->getActive();

        return $array;
    }
    

}

?>