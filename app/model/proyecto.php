<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of proyecto
 *
 * @author Only Dev & OP
 */
class proyecto {

    private $id_proyecto;
    private $id_trabajo_proyecto;
    private $id_plantilla_alcance_proyecto;
    private $estado_proyecto;

    function __construct($id_proyecto, $id_trabajo_proyecto, $id_plantilla_alcance_proyecto, $estado_proyecto) {
        $this->id_proyecto = $id_proyecto;
        $this->id_trabajo_proyecto = $id_trabajo_proyecto;
        $this->id_plantilla_alcance_proyecto = $id_plantilla_alcance_proyecto;
        $this->estado_proyecto = $estado_proyecto;
    }
    function getId_proyecto() {
        return $this->id_proyecto;
    }

    function getId_trabajo_proyecto() {
        return $this->id_trabajo_proyecto;
    }

    function getId_plantilla_alcance_proyecto() {
        return $this->id_plantilla_alcance_proyecto;
    }

    function getEstado_proyecto() {
        return $this->estado_proyecto;
    }

    function setId_proyecto($id_proyecto) {
        $this->id_proyecto = $id_proyecto;
    }

    function setId_trabajo_proyecto($id_trabajo_proyecto) {
        $this->id_trabajo_proyecto = $id_trabajo_proyecto;
    }

    function setId_plantilla_alcance_proyecto($id_plantilla_alcance_proyecto) {
        $this->id_plantilla_alcance_proyecto = $id_plantilla_alcance_proyecto;
    }

    function setEstado_proyecto($estado_proyecto) {
        $this->estado_proyecto = $estado_proyecto;
    }


}
