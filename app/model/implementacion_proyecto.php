<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of implementacion_proyecto
 *
 * @author Only Dev & OP
 */
class implementacion_proyecto {
    private $id_implentacion_item_proyecto;
    private $id_item_grupo_plantilla_certificacion;
    private $id_proyecto;
    private $comentario_implementacion;
    private $porcentaje_avance;
    private $fecha_comentario_implentacion;
    private $estado_implementacion;
    private $colaboradores;
    
    function __construct($id_implentacion_item_proyecto, $id_item_grupo_plantilla_certificacion, $id_proyecto, $comentario_implementacion, $porcentaje_avance, $fecha_comentario_implentacion, $estado_implementacion,$colaboradores) {
        $this->id_implentacion_item_proyecto = $id_implentacion_item_proyecto;
        $this->id_item_grupo_plantilla_certificacion = $id_item_grupo_plantilla_certificacion;
        $this->id_proyecto = $id_proyecto;
        $this->comentario_implementacion = $comentario_implementacion;
        $this->porcentaje_avance = $porcentaje_avance;
        $this->fecha_comentario_implentacion = $fecha_comentario_implentacion;
        $this->estado_implementacion = $estado_implementacion;
        $this->colaboradores = $colaboradores;
    }
    
    function getId_implentacion_item_proyecto() {
        return $this->id_implentacion_item_proyecto;
    }

    function getId_item_grupo_plantilla_certificacion() {
        return $this->id_item_grupo_plantilla_certificacion;
    }

    function getId_proyecto() {
        return $this->id_proyecto;
    }

    function getComentario_implementacion() {
        return $this->comentario_implementacion;
    }

    function getPorcentaje_avance() {
        return $this->porcentaje_avance;
    }

    function getFecha_comentario_implentacion() {
        return $this->fecha_comentario_implentacion;
    }

    function getEstado_implementacion() {
        return $this->estado_implementacion;
    }

    function getColaboradores() {
        return $this->colaboradores;
    }

    function setId_implentacion_item_proyecto($id_implentacion_item_proyecto) {
        $this->id_implentacion_item_proyecto = $id_implentacion_item_proyecto;
    }

    function setId_item_grupo_plantilla_certificacion($id_item_grupo_plantilla_certificacion) {
        $this->id_item_grupo_plantilla_certificacion = $id_item_grupo_plantilla_certificacion;
    }

    function setId_proyecto($id_proyecto) {
        $this->id_proyecto = $id_proyecto;
    }

    function setComentario_implementacion($comentario_implementacion) {
        $this->comentario_implementacion = $comentario_implementacion;
    }

    function setPorcentaje_avance($porcentaje_avance) {
        $this->porcentaje_avance = $porcentaje_avance;
    }

    function setFecha_comentario_implentacion($fecha_comentario_implentacion) {
        $this->fecha_comentario_implentacion = $fecha_comentario_implentacion;
    }

    function setEstado_implementacion($estado_implementacion) {
        $this->estado_implementacion = $estado_implementacion;
    }


}