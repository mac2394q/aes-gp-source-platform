<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of acuerdo_pago
 *
 * @author Only Dev & OP
 */
class acuerdo_pago {
    private $id_acuerdo_pago;
    private $id_contrato_acuerdo_pago;
    private $estado_acuerdo_pago;
    
    function __construct($id_acuerdo_pago, $id_contrato_acuerdo_pago, $estado_acuerdo_pago) {
        $this->id_acuerdo_pago = $id_acuerdo_pago;
        $this->id_contrato_acuerdo_pago = $id_contrato_acuerdo_pago;
        $this->estado_acuerdo_pago = $estado_acuerdo_pago;
        
    }

    function getId_acuerdo_pago() {
        return $this->id_acuerdo_pago;
    }

    function getId_contrato_acuerdo_pago() {
        return $this->id_contrato_acuerdo_pago;
    }

    function getEstado_acuerdo_pago() {
        return $this->estado_acuerdo_pago;
    }

    function setId_acuerdo_pago($id_acuerdo_pago) {
        $this->id_acuerdo_pago = $id_acuerdo_pago;
    }

    function setId_contrato_acuerdo_pago($id_contrato_acuerdo_pago) {
        $this->id_contrato_acuerdo_pago = $id_contrato_acuerdo_pago;
    }

    function setEstado_acuerdo_pago($estado_acuerdo_pago) {
        $this->estado_acuerdo_pago = $estado_acuerdo_pago;
    }


}
