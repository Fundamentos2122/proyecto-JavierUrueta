<?php

class Cita{

    private $_id;
    private $_user;
    private $_profe;
    private $_fecha;
    private $_hora;
    private $_activo;

    public function __construct($id, $user, $profe, $fecha, $hora, $activo){
        $this->setId($id);
        $this->setUser($user);
        $this->setProfe($profe);
        $this->setFecha($fecha);
        $this->setHora($hora);
        $this->setActivo($activo);
    }

    public function getId() {
        return $this->_id;
    }

    public function setId($id) {
        $this->_id = $id;
    }

    public function getUser() {
        return $this->_user;
    }

    public function setUser($user) {
        $this->_user = $user;
    }     

    public function getProfe() {
        return $this->_profe;
    }

    public function setProfe($profe) {
        $this->_profe = $profe;
    } 

    public function getHora() {
        return $this->_hora;
    }

    public function setHora($hora) {
        $this->_hora = $hora;
    }

    public function getFecha() {
        return $this->_fecha;
    }

    public function setFecha($fecha) {
        $this->_fecha = $fecha;
    }   

    public function getActivo() {
        return $this->_activo;
    }

    public function setActivo($activo) {
        $this->_activo = $activo;
    } 

    public function getArray() {
        $array = array();

        $array["id"] = $this->getId();
        $array["user"] = $this->getUser();
        $array["profe"] = $this->getProfe();
        $array["fecha"] = $this->getFecha();
        $array["hora"] = $this->getHora();
        $array["activo"] = $this->getActivo();

        return $array;
    }
    

}

?>