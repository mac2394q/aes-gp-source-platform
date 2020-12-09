<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of alcance
 *
 * @author Only Dev & OP
 */
class alcance {
    private $id_alcance;
    private $nombre_alcance;
    private $estado_alcance;
    
    function __construct($id_alcance, $nombre_alcance, $estado_alcance) {
        $this->id_alcance = $id_alcance;
        $this->nombre_alcance = $nombre_alcance;
        $this->estado_alcance = $estado_alcance;
        
    }

    function getId_alcance() {
        return $this->id_alcance;
    }

    function getNombre_alcance() {
        return $this->nombre_alcance;
    }

    function getEstado_alcance() {
        return $this->estado_alcance;
    }

    function setId_alcance($id_alcance) {
        $this->id_alcance = $id_alcance;
    }

    function setNombre_alcance($nombre_alcance) {
        $this->nombre_alcance = $nombre_alcance;
    }

    function setEstado_alcance($estado_alcance) {
        $this->estado_alcance = $estado_alcance;
    }


}
