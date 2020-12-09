<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of usuario
 *
 * @author Only Dev & OP
 */
class usuario {
    private $id_usuario;
    private $id_pais_usuario;
    private $documento_identificacion_usuario;
    private $nombre_usuario;
    private $rol_usuario;
    private $login_usuario;
    private $clave_usuario;
    private $telefono_usuario;
    private $direccion_usuario;
    private $correo_usuario;
    private $ciudad_usuario;
    private $fecha_creacion_usuario;
    private $estado;
 
    function __construct($id_usuario, $id_pais_usuario, $documento_identificacion_usuario, $nombre_usuario, $rol_usuario, $login_usuario, $clave_usuario, $telefono_usuario, $direccion_usuario, $correo_usuario, $ciudad_usuario, $fecha_creacion_usuario,$estado) {
        $this->id_usuario = $id_usuario;
        $this->id_pais_usuario = $id_pais_usuario;
        $this->documento_identificacion_usuario = $documento_identificacion_usuario;
        $this->nombre_usuario = $nombre_usuario;
        $this->rol_usuario = $rol_usuario;
        $this->login_usuario = $login_usuario;
        $this->clave_usuario = $clave_usuario;
        $this->telefono_usuario = $telefono_usuario;
        $this->direccion_usuario = $direccion_usuario;
        $this->correo_usuario = $correo_usuario;
        $this->ciudad_usuario = $ciudad_usuario;
        $this->fecha_creacion_usuario = $fecha_creacion_usuario;
        $this->estado = $estado;
    }

    function getId_usuario() {
        return $this->id_usuario;
    }

    function getId_pais_usuario() {
        return $this->id_pais_usuario;
    }

    function getDocumento_identificacion_usuario() {
        return $this->documento_identificacion_usuario;
    }

    function getNombre_usuario() {
        return $this->nombre_usuario;
    }

    function getRol_usuario() {
        return $this->rol_usuario;
    }

    function getLogin_usuario() {
        return $this->login_usuario;
    }

    function getClave_usuario() {
        return $this->clave_usuario;
    }

    function getTelefono_usuario() {
        return $this->telefono_usuario;
    }

    function getDireccion_usuario() {
        return $this->direccion_usuario;
    }

    function getCorreo_usuario() {
        return $this->correo_usuario;
    }

    function getCiudad_usuario() {
        return $this->ciudad_usuario;
    }

    function getFecha_creacion_usuario() {
        return $this->fecha_creacion_usuario;
    }

    function getEstado() {
        return $this->estado;
    }

    function setId_usuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

    function setId_pais_usuario($id_pais_usuario) {
        $this->id_pais_usuario = $id_pais_usuario;
    }

    function setDocumento_identificacion_usuario($documento_identificacion_usuario) {
        $this->documento_identificacion_usuario = $documento_identificacion_usuario;
    }

    function setNombre_usuario($nombre_usuario) {
        $this->nombre_usuario = $nombre_usuario;
    }

    function setRol_usuario($rol_usuario) {
        $this->rol_usuario = $rol_usuario;
    }

    function setLogin_usuario($login_usuario) {
        $this->login_usuario = $login_usuario;
    }

    function setClave_usuario($clave_usuario) {
        $this->clave_usuario = $clave_usuario;
    }

    function setTelefono_usuario($telefono_usuario) {
        $this->telefono_usuario = $telefono_usuario;
    }

    function setDireccion_usuario($direccion_usuario) {
        $this->direccion_usuario = $direccion_usuario;
    }

    function setCorreo_usuario($correo_usuario) {
        $this->correo_usuario = $correo_usuario;
    }

    function setCiudad_usuario($ciudad_usuario) {
        $this->ciudad_usuario = $ciudad_usuario;
    }

    function setFecha_creacion_usuario($fecha_creacion_usuario) {
        $this->fecha_creacion_usuario = $fecha_creacion_usuario;
    }


    
    
   

}
