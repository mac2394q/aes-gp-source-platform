<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Description of trabajo
 *
 * @author Only Dev & OP
 */
class trabajo {
    
    private $id_trabajo;
    private $id_entrada_trabajo;
    private $id_usuario_diagnostico;
    private $fecha_fin_diagnostico_trabajo;
    private $id_usuario_implementacion;
    private $fecha_fin_implementacion_trabajo;
    private $id_usuario_preauditoria;
    private $fecha_fin_preauditoria_trabajo;
    private $fecha_creacio_trabajo;
    private $fecha_cierre_trabajo;
    private $solitud_acompanamiento_dian_trabajo;
    private $fecha_inscripcion_dian_trabajo;
    private $fecha_visita_dian_trabajo;
    private $estado_trabajo;
    
    function __construct($id_trabajo, $id_entrada_trabajo, $id_usuario_diagnostico, $fecha_fin_diagnostico_trabajo, $id_usuario_implementacion, $fecha_fin_implementacion_trabajo, $id_usuario_preauditoria, $fecha_fin_preauditoria_trabajo, $fecha_creacio_trabajo, $fecha_cierre_trabajo, $solitud_acompanamiento_dian_trabajo, $fecha_inscripcion_dian_trabajo, $fecha_visita_dian_trabajo, $estado_trabajo) {
        $this->id_trabajo = $id_trabajo;
        $this->id_entrada_trabajo = $id_entrada_trabajo;
        $this->id_usuario_diagnostico = $id_usuario_diagnostico;
        $this->fecha_fin_diagnostico_trabajo = $fecha_fin_diagnostico_trabajo;
        $this->id_usuario_implementacion = $id_usuario_implementacion;
        $this->fecha_fin_implementacion_trabajo = $fecha_fin_implementacion_trabajo;
        $this->id_usuario_preauditoria = $id_usuario_preauditoria;
        $this->fecha_fin_preauditoria_trabajo = $fecha_fin_preauditoria_trabajo;
        $this->fecha_creacio_trabajo = $fecha_creacio_trabajo;
        $this->fecha_cierre_trabajo = $fecha_cierre_trabajo;
        $this->solitud_acompanamiento_dian_trabajo = $solitud_acompanamiento_dian_trabajo;
        $this->fecha_inscripcion_dian_trabajo = $fecha_inscripcion_dian_trabajo;
        $this->fecha_visita_dian_trabajo = $fecha_visita_dian_trabajo;
        $this->estado_trabajo = $estado_trabajo;
          
    }
    function getId_trabajo() {
        return $this->id_trabajo;
    }
    function getId_entrada_trabajo() {
        return $this->id_entrada_trabajo;
    }
    function getId_usuario_diagnostico() {
        return $this->id_usuario_diagnostico;
    }
    function getFecha_fin_diagnostico_trabajo() {
        return $this->fecha_fin_diagnostico_trabajo;
    }
    function getId_usuario_implementacion() {
        return $this->id_usuario_implementacion;
    }
    function getFecha_fin_implementacion_trabajo() {
        return $this->fecha_fin_implementacion_trabajo;
    }
    function getId_usuario_preauditoria() {
        return $this->id_usuario_preauditoria;
    }
    function getFecha_fin_preauditoria_trabajo() {
        return $this->fecha_fin_preauditoria_trabajo;
    }
    function getFecha_creacio_trabajo() {
        return $this->fecha_creacio_trabajo;
    }
    function getFecha_cierre_trabajo() {
        return $this->fecha_cierre_trabajo;
    }
    function getSolitud_acompanamiento_dian_trabajo() {
        return $this->solitud_acompanamiento_dian_trabajo;
    }
    function getFecha_inscripcion_dian_trabajo() {
        return $this->fecha_inscripcion_dian_trabajo;
    }
    function getFecha_visita_dian_trabajo() {
        return $this->fecha_visita_dian_trabajo;
    }
    function getEstado_trabajo() {
        return $this->estado_trabajo;
    }
    function setId_trabajo($id_trabajo) {
        $this->id_trabajo = $id_trabajo;
    }
    function setId_entrada_trabajo($id_entrada_trabajo) {
        $this->id_entrada_trabajo = $id_entrada_trabajo;
    }
    function setId_usuario_diagnostico($id_usuario_diagnostico) {
        $this->id_usuario_diagnostico = $id_usuario_diagnostico;
    }
    function setFecha_fin_diagnostico_trabajo($fecha_fin_diagnostico_trabajo) {
        $this->fecha_fin_diagnostico_trabajo = $fecha_fin_diagnostico_trabajo;
    }
    function setId_usuario_implementacion($id_usuario_implementacion) {
        $this->id_usuario_implementacion = $id_usuario_implementacion;
    }
    function setFecha_fin_implementacion_trabajo($fecha_fin_implementacion_trabajo) {
        $this->fecha_fin_implementacion_trabajo = $fecha_fin_implementacion_trabajo;
    }
    function setId_usuario_preauditoria($id_usuario_preauditoria) {
        $this->id_usuario_preauditoria = $id_usuario_preauditoria;
    }
    function setFecha_fin_preauditoria_trabajo($fecha_fin_preauditoria_trabajo) {
        $this->fecha_fin_preauditoria_trabajo = $fecha_fin_preauditoria_trabajo;
    }
    function setFecha_creacio_trabajo($fecha_creacio_trabajo) {
        $this->fecha_creacio_trabajo = $fecha_creacio_trabajo;
    }
    function setFecha_cierre_trabajo($fecha_cierre_trabajo) {
        $this->fecha_cierre_trabajo = $fecha_cierre_trabajo;
    }
    function setSolitud_acompanamiento_dian_trabajo($solitud_acompanamiento_dian_trabajo) {
        $this->solitud_acompanamiento_dian_trabajo = $solitud_acompanamiento_dian_trabajo;
    }
    function setFecha_inscripcion_dian_trabajo($fecha_inscripcion_dian_trabajo) {
        $this->fecha_inscripcion_dian_trabajo = $fecha_inscripcion_dian_trabajo;
    }
    function setFecha_visita_dian_trabajo($fecha_visita_dian_trabajo) {
        $this->fecha_visita_dian_trabajo = $fecha_visita_dian_trabajo;
    }
    function setEstado_trabajo($estado_trabajo) {
        $this->estado_trabajo = $estado_trabajo;
    }
}
