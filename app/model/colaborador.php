<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of colaborador
 *
 * @author Only Dev & OP
 */
class colaborador {
    private $id_colaborador;
    private $nombre_colaborador;
    private $cargo_colaborador;
    private $idproyecto;
    
    function __construct($id_colaborador, $nombre_colaborador, $cargo_colaborador,$idproyecto) {
        $this->id_colaborador = $id_colaborador;
        $this->nombre_colaborador = $nombre_colaborador;
        $this->cargo_colaborador = $cargo_colaborador;
        $this->idproyecto = $idproyecto;
        
    }

    function getId_colaborador() {
        return $this->id_colaborador;
    }

    function getNombre_colaborador() {
        return $this->nombre_colaborador;
    }

    function getCargo_colaborador() {
        return $this->cargo_colaborador;
    }

    function getidproyecto() {
        return $this->idproyecto;
    }

    function setId_colaborador($id_colaborador) {
        $this->id_colaborador = $id_colaborador;
    }

    function setNombre_colaborador($nombre_colaborador) {
        $this->nombre_colaborador = $nombre_colaborador;
    }

    function setCargo_colaborador($cargo_colaborador) {
        $this->cargo_colaborador = $cargo_colaborador;
    }


}
