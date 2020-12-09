<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cuota
 *
 * @author Only Dev & OP
 */
class cuota {
    private $id_cuota;
    private $id_acuerdo_pago_cuota;
    private $numero_cuota;
    private $monto_cuota;
    private $porcentaje_cuota;
    private $estado_cuota;
    private $observacion;
    
    function __construct($id_cuota, $id_acuerdo_pago_cuota, $numero_cuota, $monto_cuota, $porcentaje_cuota, $estado_cuota,$observacion) {
        $this->id_cuota = $id_cuota;
        $this->id_acuerdo_pago_cuota = $id_acuerdo_pago_cuota;
        $this->numero_cuota = $numero_cuota;
        $this->monto_cuota = $monto_cuota;
        $this->porcentaje_cuota = $porcentaje_cuota;
        $this->estado_cuota = $estado_cuota;
        $this->observacion = $observacion;
        
    }

    function getId_cuota() {
        return $this->id_cuota;
    }

    function getId_acuerdo_pago_cuota() {
        return $this->id_acuerdo_pago_cuota;
    }

    function getNumero_cuota() {
        return $this->numero_cuota;
    }

    function getMonto_cuota() {
        return $this->monto_cuota;
    }

    function getPorcentaje_cuota() {
        return $this->porcentaje_cuota;
    }

    function getEstado_cuota() {
        return $this->estado_cuota;
    }

    function getObservacion() {
        return $this->observacion;
    }

    function setId_cuota($id_cuota) {
        $this->id_cuota = $id_cuota;
    }

    function setId_acuerdo_pago_cuota($id_acuerdo_pago_cuota) {
        $this->id_acuerdo_pago_cuota = $id_acuerdo_pago_cuota;
    }

    function setNumero_cuota($numero_cuota) {
        $this->numero_cuota = $numero_cuota;
    }

    function setMonto_cuota($monto_cuota) {
        $this->monto_cuota = $monto_cuota;
    }

    function setPorcentaje_cuota($porcentaje_cuota) {
        $this->porcentaje_cuota = $porcentaje_cuota;
    }

    function setEstado_cuota($estado_cuota) {
        $this->estado_cuota = $estado_cuota;
    }


}
