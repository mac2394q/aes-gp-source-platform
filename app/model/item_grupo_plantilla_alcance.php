<?php


class item_grupo_plantilla_alcance {
   private  $id_item_grupo_plantilla_certificacion;
    private $id_grupo_plantilla_certificacion;
    private $etiqueta_item_plantilla;
    private $descripcion_item_plantilla;
    
    function __construct($id_item_grupo_plantilla_certificacion, $id_grupo_plantilla_certificacion, $etiqueta_item_plantilla, $descripcion_item_plantilla) {
        $this->id_item_grupo_plantilla_certificacion = $id_item_grupo_plantilla_certificacion;
        $this->id_grupo_plantilla_certificacion = $id_grupo_plantilla_certificacion;
        $this->etiqueta_item_plantilla = $etiqueta_item_plantilla;
        $this->descripcion_item_plantilla = $descripcion_item_plantilla;
    }
    
    function getId_item_grupo_plantilla_certificacion() {
        return $this->id_item_grupo_plantilla_certificacion;
    }
    function getId_grupo_plantilla_certificacion() {
        return $this->id_grupo_plantilla_certificacion;
    }
    function getEtiqueta_item_plantilla() {
        return $this->etiqueta_item_plantilla;
    }
    function getDescripcion_item_plantilla() {
        return $this->descripcion_item_plantilla;
    }
    function setId_item_grupo_plantilla_certificacion($id_item_grupo_plantilla_certificacion) {
        $this->id_item_grupo_plantilla_certificacion = $id_item_grupo_plantilla_certificacion;
    }
    function setId_grupo_plantilla_certificacion($id_grupo_plantilla_certificacion) {
        $this->id_grupo_plantilla_certificacion = $id_grupo_plantilla_certificacion;
    }
    function setEtiqueta_item_plantilla($etiqueta_item_plantilla) {
        $this->etiqueta_item_plantilla = $etiqueta_item_plantilla;
    }
    function setDescripcion_item_plantilla($descripcion_item_plantilla) {
        $this->descripcion_item_plantilla = $descripcion_item_plantilla;
    }
}
