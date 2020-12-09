<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of contrato
 *
 * @author Only Dev & OP
 */
class contrato {
    private $id_contrato;
    private $id_entidad_pago_contrato;
    private $valor_contrato;
    private $fecha_firma_contrato;
    private $estado_contrato;
    private $idtrabajo;
    
    function __construct($id_contrato, $id_entidad_pago_contrato, $valor_contrato, $fecha_firma_contrato, $estado_contrato,$idtrabajo) {
        $this->id_contrato = $id_contrato;
        $this->id_entidad_pago_contrato = $id_entidad_pago_contrato;
        $this->valor_contrato = $valor_contrato;
        $this->fecha_firma_contrato = $fecha_firma_contrato;
        $this->estado_contrato = $estado_contrato;
        $this->idtrabajo = $idtrabajo;
        
    }

    function getId_contrato() {
        return $this->id_contrato;
    }

    function getId_entidad_pago_contrato() {
        return $this->id_entidad_pago_contrato;
    }

    function getValor_contrato() {
        return $this->valor_contrato;
    }

    function getFecha_firma_contrato() {
        return $this->fecha_firma_contrato;
    }

    function getEstado_contrato() {
        return $this->estado_contrato;
    }

    function getIdtrabajo() {
        return $this->idtrabajo;
    }



    function setId_contrato($id_contrato) {
        $this->id_contrato = $id_contrato;
    }

    function setId_entidad_pago_contrato($id_entidad_pago_contrato) {
        $this->id_entidad_pago_contrato = $id_entidad_pago_contrato;
    }

    function setValor_contrato($valor_contrato) {
        $this->valor_contrato = $valor_contrato;
    }

    function setFecha_firma_contrato($fecha_firma_contrato) {
        $this->fecha_firma_contrato = $fecha_firma_contrato;
    }

    function setEstado_contrato($estado_contrato) {
        $this->estado_contrato = $estado_contrato;
    }


}
