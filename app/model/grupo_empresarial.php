<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of grupo_empresarial
 *
 * @author Only Dev & OP
 */
class grupo_empresarial {
    private $id_entidad;
    private $nombre_grupo_empresarial;
    private $id_usuario;
    
    function __construct($id_entidad, $nombre_grupo_empresarial,$id_usuario) {
        $this->id_entidad = $id_entidad;
        $this->nombre_grupo_empresarial = $nombre_grupo_empresarial;
        $this->id_usuario = $id_usuario;
    }

    function getId_entidad() {
        return $this->id_entidad;
    }

    function getNombre_grupo_empresarial() {
        return $this->nombre_grupo_empresarial;
    }

    function getId_usuariod() {
        return $this->id_usuario;
    }

    function setId_entidad($id_entidad) {
        $this->id_entidad = $id_entidad;
    }

    function setNombre_grupo_empresarial($nombre_grupo_empresarial) {
        $this->nombre_grupo_empresarial = $nombre_grupo_empresarial;
    }


}
