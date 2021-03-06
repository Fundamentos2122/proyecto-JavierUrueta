<?php

class User {
    private $_id;
    private $_username;
    private $_horaclase;
    private $_semana;
    private $_password;
    private $_type;



    public function __construct($id, $username, $horaclase, $semana, $password, $type) {
        $this->setId($id);
        $this->setUsername($username);
        $this->setHoraclase($horaclase);
        $this->setSemana($semana);
        $this->setPassword($password);
        $this->setType($type);
    }

    public function getId() {
        return $this->_id;
    }

    public function setId($id) {
        $this->_id = $id;
    }

    public function getUsername() {
        return $this->_username;
    }

    public function setUsername($username) {
        $this->_username = $username;
    }

    public function getHoraclase() {
        return $this->_horaclase;
    }

    public function setHoraclase($horaclase) {
        $this->_horaclase = $horaclase;
    }

    public function getSemana() {
        return $this->_semana;
    }

    public function setSemana($semana) {
        $this->_semana = $semana;
    }

    public function getPassword() {
        return $this->_password;
    }

    public function setPassword($password) {
        $this->_password = $password;
    }

    public function getType() {
        return $this->_type;
    }

    public function setType($type) {
        $this->_type = $type;
    }

    public function getArray() {
        $array = array();

        $array["id"] = $this->getId();
        $array["usuario"] = $this->getUsername();
        $array["horaclase"] = $this->getHoraclase();
        $array["semana"] = $this->getSemana();
        $array["password"] = $this->getPassword();
        $array["type"] = $this->getType();

        return $array;
    }
}
?>