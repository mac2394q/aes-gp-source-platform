<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of diagnostico_proyecto
 *
 * @author Only Dev & OP
 */
class diagnostico_proyecto {
    private $id_diagnostico_item_proyecto;
    private $id_proyecto;
    private $id_item_grupo_plantilla_alcance;
    private $comentario_dliagnostico;
    private $estado_diagnostico;
    
    function __construct($id_diagnostico_item_proyecto, $id_proyecto, $id_item_grupo_plantilla_alcance, $comentario_dliagnostico, $estado_diagnostico) {
        $this->id_diagnostico_item_proyecto = $id_diagnostico_item_proyecto;
        $this->id_proyecto = $id_proyecto;
        $this->id_item_grupo_plantilla_alcance = $id_item_grupo_plantilla_alcance;
        $this->comentario_dliagnostico = $comentario_dliagnostico;
        $this->estado_diagnostico = $estado_diagnostico;
        
    }

    function getId_diagnostico_item_proyecto() {
        return $this->id_diagnostico_item_proyecto;
    }

    function getId_proyecto() {
        return $this->id_proyecto;
    }

    function getId_item_grupo_plantilla_alcance() {
        return $this->id_item_grupo_plantilla_alcance;
    }

    function getComentario_diagnostico() {
        return $this->comentario_dliagnostico;
    }

    function getEstado_diagnostico() {
        return $this->estado_diagnostico;
    }

    function setId_diagnostico_item_proyecto($id_diagnostico_item_proyecto) {
        $this->id_diagnostico_item_proyecto = $id_diagnostico_item_proyecto;
    }

    function setId_proyecto($id_proyecto) {
        $this->id_proyecto = $id_proyecto;
    }

    function setId_item_grupo_plantilla_alcance($id_item_grupo_plantilla_alcance) {
        $this->id_item_grupo_plantilla_alcance = $id_item_grupo_plantilla_alcance;
    }

    function setComentario_dliagnostico($comentario_dliagnostico) {
        $this->comentario_dliagnostico = $comentario_dliagnostico;
    }

    function setEstado_diagnostico($estado_diagnostico) {
        $this->estado_diagnostico = $estado_diagnostico;
    }


}
