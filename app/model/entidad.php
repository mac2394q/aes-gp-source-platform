<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of entidad
 *
 * @author Only Dev & OP
 */
class entidad {
    private $id_entidad;
    private $tipo_entidad;
    private $estado_entidad;
    
    function __construct($id_entidad, $tipo_entidad, $estado_entidad) {
        $this->id_entidad = $id_entidad;
        $this->tipo_entidad = $tipo_entidad;
        $this->estado_entidad = $estado_entidad;

        
    }

    function getId_entidad() {
        return $this->id_entidad;
    }

    function getTipo_entidad() {
        return $this->tipo_entidad;
    }

    function getEstado_entidad() {
        return $this->estado_entidad;
    }


    function setId_entidad($id_entidad) {
        $this->id_entidad = $id_entidad;
    }

    function setTipo_entidad($tipo_entidad) {
        $this->tipo_entidad = $tipo_entidad;
    }

    function setEstado_entidad($estado_entidad) {
        $this->estado_entidad = $estado_entidad;
    }


}
