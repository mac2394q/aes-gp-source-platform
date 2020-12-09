<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of reporteDiagnostico
 *
 * @author Only Dev & OP
 */
class reporteDiagnostico {
    private $idDiagnostico;
    private $actividades;
    private $aspectos;
    private $hallazgos;
    private $conclusion;
    
    function __construct($idDiagnostico, $actividades, $aspectos, $hallazgos, $conclusion) {
        $this->idDiagnostico = $idDiagnostico;
        $this->actividades = $actividades;
        $this->aspectos = $aspectos;
        $this->hallazgos = $hallazgos;
        $this->conclusion = $conclusion;
    }
    
    
    function getIdDiagnostico() {
        return $this->idDiagnostico;
    }

    function getActividades() {
        return $this->actividades;
    }

    function getAspectos() {
        return $this->aspectos;
    }

    function getHallazgos() {
        return $this->hallazgos;
    }

    function getConclusion() {
        return $this->conclusion;
    }

    function setIdDiagnostico($idDiagnostico) {
        $this->idDiagnostico = $idDiagnostico;
    }

    function setActividades($actividades) {
        $this->actividades = $actividades;
    }

    function setAspectos($aspectos) {
        $this->aspectos = $aspectos;
    }

    function setHallazgos($hallazgos) {
        $this->hallazgos = $hallazgos;
    }

    function setConclusion($conclusion) {
        $this->conclusion = $conclusion;
    }



}
