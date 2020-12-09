<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Description of empresa
 *
 * @author Only Dev & OP
 */
class empresa {
    private $id_entidad;
    private $id_pais_empresa;
    private $gru_id_entidad;
    private $nombre_empresa;
    private $identificacion_empresa;
    private $departamento_empresa;
    private $ciudad_empresa;
    private $direccion_empresa;
    private $naturaleza_empresa;
    private $telefono_empresa;
    private $email_empresa;
    private $nombre_representate_empresa;
    private $identificacion_representante_empresa;
    private $telefono_representante_empresa;
    private $email_representante_empresa;
    private $nombre_contacto_empresa2;
    private $cargo_contacto_empresa2;
    private $telefono_contato_empresa2;
    private $email_contacto_empresa2;
    private $link_plataforma_factura_empresa;
    private $usuario_plataforma_facturacion_empresa;
    private $fecha_registro_empresa;
    private $idusuario;
    
    function __construct($id_entidad, $id_pais_empresa, $gru_id_entidad, $nombre_empresa, $identificacion_empresa, $departamento_empresa, $ciudad_empresa, $direccion_empresa, $naturaleza_empresa, $telefono_empresa, $email_empresa, $nombre_representate_empresa, $identificacion_representante_empresa, $telefono_representante_empresa, $email_representante_empresa, $nombre_contacto_empresa2, $cargo_contacto_empresa2, $telefono_contato_empresa2, $email_contacto_empresa2, $link_plataforma_factura_empresa, $usuario_plataforma_facturacion_empresa, $fecha_registro_empresa,$idusuario) {
        $this->id_entidad = $id_entidad;
        $this->id_pais_empresa = $id_pais_empresa;
        $this->gru_id_entidad = $gru_id_entidad;
        $this->nombre_empresa = $nombre_empresa;
        $this->identificacion_empresa = $identificacion_empresa;
        $this->departamento_empresa = $departamento_empresa;
        $this->ciudad_empresa = $ciudad_empresa;
        $this->direccion_empresa = $direccion_empresa;
        $this->naturaleza_empresa = $naturaleza_empresa;
        $this->telefono_empresa = $telefono_empresa;
        $this->email_empresa = $email_empresa;
        $this->nombre_representate_empresa = $nombre_representate_empresa;
        $this->identificacion_representante_empresa = $identificacion_representante_empresa;
        $this->telefono_representante_empresa = $telefono_representante_empresa;
        $this->email_representante_empresa = $email_representante_empresa;
        $this->nombre_contacto_empresa2 = $nombre_contacto_empresa2;
        $this->cargo_contacto_empresa2 = $cargo_contacto_empresa2;
        $this->telefono_contato_empresa2 = $telefono_contato_empresa2;
        $this->email_contacto_empresa2 = $email_contacto_empresa2;
        $this->link_plataforma_factura_empresa = $link_plataforma_factura_empresa;
        $this->usuario_plataforma_facturacion_empresa = $usuario_plataforma_facturacion_empresa;
        $this->fecha_registro_empresa = $fecha_registro_empresa;
        $this->idusuario = $idusuario;
        
    }
    
    function getId_entidad() {
        return $this->id_entidad;
    }
    function getId_pais_empresa() {
        return $this->id_pais_empresa;
    }
    function getGru_id_entidad() {
        return $this->gru_id_entidad;
    }
    function getNombre_empresa() {
        return $this->nombre_empresa;
    }
    function getIdentificacion_empresa() {
        return $this->identificacion_empresa;
    }
    function getDepartamento_empresa() {
        return $this->departamento_empresa;
    }
    function getCiudad_empresa() {
        return $this->ciudad_empresa;
    }
    function getDireccion_empresa() {
        return $this->direccion_empresa;
    }
    function getNaturaleza_empresa() {
        return $this->naturaleza_empresa;
    }
    function getTelefono_empresa() {
        return $this->telefono_empresa;
    }
    function getEmail_empresa() {
        return $this->email_empresa;
    }
    function getNombre_representate_empresa() {
        return $this->nombre_representate_empresa;
    }
    function getIdentificacion_representante_empresa() {
        return $this->identificacion_representante_empresa;
    }
    function getTelefono_representante_empresa() {
        return $this->telefono_representante_empresa;
    }
    function getEmail_representante_empresa() {
        return $this->email_representante_empresa;
    }
    function getNombre_contacto_empresa2() {
        return $this->nombre_contacto_empresa2;
    }
    function getCargo_contacto_empresa2() {
        return $this->cargo_contacto_empresa2;
    }
    function getTelefono_contato_empresa2() {
        return $this->telefono_contato_empresa2;
    }
    function getEmail_contacto_empresa2() {
        return $this->email_contacto_empresa2;
    }
    function getLink_plataforma_factura_empresa() {
        return $this->link_plataforma_factura_empresa;
    }
    function getUsuario_plataforma_facturacion_empresa() {
        return $this->usuario_plataforma_facturacion_empresa;
    }
    function getFecha_registro_empresa() {
        return $this->fecha_registro_empresa;
    }
    function getIdusuario() {
        return $this->idusuario;
    }
    function setId_entidad($id_entidad) {
        $this->id_entidad = $id_entidad;
    }
    function setId_pais_empresa($id_pais_empresa) {
        $this->id_pais_empresa = $id_pais_empresa;
    }
    function setGru_id_entidad($gru_id_entidad) {
        $this->gru_id_entidad = $gru_id_entidad;
    }
    function setNombre_empresa($nombre_empresa) {
        $this->nombre_empresa = $nombre_empresa;
    }
    function setIdentificacion_empresa($identificacion_empresa) {
        $this->identificacion_empresa = $identificacion_empresa;
    }
    function setDepartamento_empresa($departamento_empresa) {
        $this->departamento_empresa = $departamento_empresa;
    }
    function setCiudad_empresa($ciudad_empresa) {
        $this->ciudad_empresa = $ciudad_empresa;
    }
    function setDireccion_empresa($direccion_empresa) {
        $this->direccion_empresa = $direccion_empresa;
    }
    function setNaturaleza_empresa($naturaleza_empresa) {
        $this->naturaleza_empresa = $naturaleza_empresa;
    }
    function setTelefono_empresa($telefono_empresa) {
        $this->telefono_empresa = $telefono_empresa;
    }
    function setEmail_empresa($email_empresa) {
        $this->email_empresa = $email_empresa;
    }
    function setNombre_representate_empresa($nombre_representate_empresa) {
        $this->nombre_representate_empresa = $nombre_representate_empresa;
    }
    function setIdentificacion_representante_empresa($identificacion_representante_empresa) {
        $this->identificacion_representante_empresa = $identificacion_representante_empresa;
    }
    function setTelefono_representante_empresa($telefono_representante_empresa) {
        $this->telefono_representante_empresa = $telefono_representante_empresa;
    }
    function setEmail_representante_empresa($email_representante_empresa) {
        $this->email_representante_empresa = $email_representante_empresa;
    }
    function setNombre_contacto_empresa2($nombre_contacto_empresa2) {
        $this->nombre_contacto_empresa2 = $nombre_contacto_empresa2;
    }
    function setCargo_contacto_empresa2($cargo_contacto_empresa2) {
        $this->cargo_contacto_empresa2 = $cargo_contacto_empresa2;
    }
    function setTelefono_contato_empresa2($telefono_contato_empresa2) {
        $this->telefono_contato_empresa2 = $telefono_contato_empresa2;
    }
    function setEmail_contacto_empresa2($email_contacto_empresa2) {
        $this->email_contacto_empresa2 = $email_contacto_empresa2;
    }
    function setLink_plataforma_factura_empresa($link_plataforma_factura_empresa) {
        $this->link_plataforma_factura_empresa = $link_plataforma_factura_empresa;
    }
    function setUsuario_plataforma_facturacion_empresa($usuario_plataforma_facturacion_empresa) {
        $this->usuario_plataforma_facturacion_empresa = $usuario_plataforma_facturacion_empresa;
    }
    function setFecha_registro_empresa($fecha_registro_empresa) {
        $this->fecha_registro_empresa = $fecha_registro_empresa;
    }
}
