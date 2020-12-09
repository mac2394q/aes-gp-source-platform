<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of plantilla_alcance
 *
 * @author Only Dev & OP
 */
class plantilla_alcance {
    private $id_plantilla_alcance;
    private $id_alcance_plantilla;
    private $id_pais_plantilla;
    private $etiqueta_plantilla;
    private $estado_plantilla;
    
    function __construct($id_plantilla_alcance, $id_alcance_plantilla, $id_pais_plantilla, $etiqueta_plantilla, $estado_plantilla) {
        $this->id_plantilla_alcance = $id_plantilla_alcance;
        $this->id_alcance_plantilla = $id_alcance_plantilla;
        $this->id_pais_plantilla = $id_pais_plantilla;
        $this->etiqueta_plantilla = $etiqueta_plantilla;
        $this->estado_plantilla = $estado_plantilla;
    }

    function getId_plantilla_alcance() {
        return $this->id_plantilla_alcance;
    }

    function getId_alcance_plantilla() {
        return $this->id_alcance_plantilla;
    }

    function getId_pais_plantilla() {
        return $this->id_pais_plantilla;
    }

    function getEtiqueta_plantilla() {
        return $this->etiqueta_plantilla;
    }

    function getEstado_plantilla() {
        return $this->estado_plantilla;
    }

    function setId_plantilla_alcance($id_plantilla_alcance) {
        $this->id_plantilla_alcance = $id_plantilla_alcance;
    }

    function setId_alcance_plantilla($id_alcance_plantilla) {
        $this->id_alcance_plantilla = $id_alcance_plantilla;
    }

    function setId_pais_plantilla($id_pais_plantilla) {
        $this->id_pais_plantilla = $id_pais_plantilla;
    }

    function setEtiqueta_plantilla($etiqueta_plantilla) {
        $this->etiqueta_plantilla = $etiqueta_plantilla;
    }

    function setEstado_plantilla($estado_plantilla) {
        $this->estado_plantilla = $estado_plantilla;
    }


}
