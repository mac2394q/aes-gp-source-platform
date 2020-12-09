<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of pais
 *
 * @author Only Dev & OP
 */
class pais {
    private $id_pais;
    private $acronimo_pais;
    private $nombre_pais;
    
    function __construct($id_pais, $acronimo_pais, $nombre_pais) {
        $this->id_pais = $id_pais;
        $this->acronimo_pais = $acronimo_pais;
        $this->nombre_pais = $nombre_pais;
    }

    function getId_pais() {
        return $this->id_pais;
    }

    function getAcronimo_pais() {
        return $this->acronimo_pais;
    }

    function getNombre_pais() {
        return $this->nombre_pais;
    }

    function setId_pais($id_pais) {
        $this->id_pais = $id_pais;
    }

    function setAcronimo_pais($acronimo_pais) {
        $this->acronimo_pais = $acronimo_pais;
    }

    function setNombre_pais($nombre_pais) {
        $this->nombre_pais = $nombre_pais;
    }


}
