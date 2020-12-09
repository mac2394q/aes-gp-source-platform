<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of empresa_proyecto
 *
 * @author Only Dev & OP
 */
class empresa_proyecto {
    private $id_empresa_proyecto;
    private $id_entidad_empresa_proyecto;
    private $id_proyecto_empresa;
    private $id_contrato_empresa_proyecto;
    private $estado_empresa_proyecto;
    
    function __construct($id_empresa_proyecto, $id_entidad_empresa_proyecto, $id_proyecto_empresa, $id_contrato_empresa_proyecto, $estado_empresa_proyecto) {
        $this->id_empresa_proyecto = $id_empresa_proyecto;
        $this->id_entidad_empresa_proyecto = $id_entidad_empresa_proyecto;
        $this->id_proyecto_empresa = $id_proyecto_empresa;
        $this->id_contrato_empresa_proyecto = $id_contrato_empresa_proyecto;
        $this->estado_empresa_proyecto = $estado_empresa_proyecto;
        
    }

    function getId_empresa_proyecto() {
        return $this->id_empresa_proyecto;
    }

    function getId_entidad_empresa_proyecto() {
        return $this->id_entidad_empresa_proyecto;
    }

    function getId_proyecto_empresa() {
        return $this->id_proyecto_empresa;
    }

    function getId_contrato_empresa_proyecto() {
        return $this->id_contrato_empresa_proyecto;
    }

    function getEstado_empresa_proyecto() {
        return $this->estado_empresa_proyecto;
    }

    function setId_empresa_proyecto($id_empresa_proyecto) {
        $this->id_empresa_proyecto = $id_empresa_proyecto;
    }

    function setId_entidad_empresa_proyecto($id_entidad_empresa_proyecto) {
        $this->id_entidad_empresa_proyecto = $id_entidad_empresa_proyecto;
    }

    function setId_proyecto_empresa($id_proyecto_empresa) {
        $this->id_proyecto_empresa = $id_proyecto_empresa;
    }

    function setId_contrato_empresa_proyecto($id_contrato_empresa_proyecto) {
        $this->id_contrato_empresa_proyecto = $id_contrato_empresa_proyecto;
    }

    function setEstado_empresa_proyecto($estado_empresa_proyecto) {
        $this->estado_empresa_proyecto = $estado_empresa_proyecto;
    }


}
