<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Description of preauditoria_proyecto
 *
 * @author Only Dev & OP
 */
class preauditoria_proyecto {
    private $id_preauditoria_item_proyecto;
    private $id_item_grupo_plantilla_certificaion;
    private $id_proyecto;
    private $comentario_preauditoria;
    private $estado_preauditoria;
    
    function __construct($id_preauditoria_item_proyecto, $id_item_grupo_plantilla_certificaion, $id_proyecto,$comentario_preauditoria,$estado_preauditoria) {
        $this->id_preauditoria_item_proyecto = $id_preauditoria_item_proyecto;
        $this->id_item_grupo_plantilla_certificaion = $id_item_grupo_plantilla_certificaion;
        $this->id_proyecto = $id_proyecto;
        $this->comentario_preauditoria = $comentario_preauditoria;
        $this->estado_preauditoria = $estado_preauditoria;
    }
    function getId_preauditoria_item_proyecto() {
        return $this->id_preauditoria_item_proyecto;
    }
    function getId_item_grupo_plantilla_certificaion() {
        return $this->id_item_grupo_plantilla_certificaion;
    }
    function getId_proyecto() {
        return $this->id_proyecto;
    }
    function getComentario_preauditoria() {
        return $this->comentario_preauditoria;
    }
    function getEstado_preauditoria() {
        return $this->estado_preauditoria;
    }
    function setId_preauditoria_item_proyecto($id_preauditoria_item_proyecto) {
        $this->id_preauditoria_item_proyecto = $id_preauditoria_item_proyecto;
    }
    function setId_item_grupo_plantilla_certificaion($id_item_grupo_plantilla_certificaion) {
        $this->id_item_grupo_plantilla_certificaion = $id_item_grupo_plantilla_certificaion;
    }
    function setId_proyecto($id_proyecto) {
        $this->id_proyecto = $id_proyecto;
    }
    function setComentario_preauditoria($comentario_preauditoria) {
        $this->comentario_preauditoria = $comentario_preauditoria;
    }
    function setEstado_preauditoria($estado_preauditoria) {
        $this->estado_preauditoria = $estado_preauditoria;
    }
}
