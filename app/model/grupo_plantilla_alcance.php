<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of grupo_plantilla_alcance
 *
 * @author Only Dev & OP
 */
class grupo_plantilla_alcance {
    private $id_grupo_plantilla_alcance;
    private $id_plantilla_alcance;
    private $etiqueta_grupo_plantilla;
    private $titulo_grupo_plantilla;
    
    function __construct($id_grupo_plantilla_alcance, $id_plantilla_alcance, $etiqueta_grupo_plantilla, $titulo_grupo_plantilla) {
        $this->id_grupo_plantilla_alcance = $id_grupo_plantilla_alcance;
        $this->id_plantilla_alcance = $id_plantilla_alcance;
        $this->etiqueta_grupo_plantilla = $etiqueta_grupo_plantilla;
        $this->titulo_grupo_plantilla = $titulo_grupo_plantilla;
    }

    function getId_grupo_plantilla_alcance() {
        return $this->id_grupo_plantilla_alcance;
    }

    function getId_plantilla_alcance() {
        return $this->id_plantilla_alcance;
    }

    function getEtiqueta_grupo_plantilla() {
        return $this->etiqueta_grupo_plantilla;
    }

    function getTitulo_grupo_plantilla() {
        return $this->titulo_grupo_plantilla;
    }

    function setId_grupo_plantilla_alcance($id_grupo_plantilla_alcance) {
        $this->id_grupo_plantilla_alcance = $id_grupo_plantilla_alcance;
    }

    function setId_plantilla_alcance($id_plantilla_alcance) {
        $this->id_plantilla_alcance = $id_plantilla_alcance;
    }

    function setEtiqueta_grupo_plantilla($etiqueta_grupo_plantilla) {
        $this->etiqueta_grupo_plantilla = $etiqueta_grupo_plantilla;
    }

    function setTitulo_grupo_plantilla($titulo_grupo_plantilla) {
        $this->titulo_grupo_plantilla = $titulo_grupo_plantilla;
    }


}
